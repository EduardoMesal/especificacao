let token = $("input[name='_token']").val();

function alertSystem(type = 'success', title = "Feito!", mesage = '...', url = null, reload = true) {
	var classes, icon;
	switch (type) {
		case 'error':
			classes = 'message-box message-box-danger animated fadeIn';
			icon = 'fa fa-times';
			break;
		case 'warning':
			classes = 'message-box animated fadeIn';
			icon = 'fa fa-exclamation-triangle';
			break;
		default:
			classes = 'message-box message-box-success animated fadeIn';
			icon = 'fa fa-check';
			break;
	}

	$("#alert-system").attr('class', classes);
	$("#alert-system").find('.mb-title').find('span').text(title);
	$("#alert-system").find('.mb-title').find('i').attr('class', icon);

	$("#alert-system").find('.mb-content').find('p').text(mesage);

	$("#alert-system").addClass('open');

	$('#alert-system').find('button.mb-control-close').on('click', function () {
		if (reload) {
			if (!url && type == 'success') {
				location.reload();
			}
			else if (url) {
				window.open(url, '_self');
			}
		}
	});
}

function getQueryParams(qs) {
	qs = qs.split('+').join(' ');

	var params = {},
		tokens,
		re = /[?&]?([^=]+)=([^&]*)/g;

	while (tokens = re.exec(qs)) {
		params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	}

	return params;
}


$(function () {
	/* --- DEFAULTS --- */

	$('[data-toggle="tooltip"]').tooltip();

	if ($("form").length) {
		$("form").each(function () {
			$(this).get(0).reset();
		});
	}

	if ($(".select").length > 0) {
		$(".select").selectpicker("refresh");
	}

	if ($('.icheckbox').length > 0) {
		$('.icheckbox').iCheck('update');
	}
	if ($('.iradio').length > 0) {
		$('.iradio').iCheck('update');
	}

	/* --- / DEFAULTS --- */

	/* --- FILEUPLOAD --- */

	if ($('.fileupload').length) {
		var thumbs = new Array();
		$('.fileupload').fileupload().on('change.bs.fileupload', function (e) {

			thumb = $(this).find('.fileupload-preview');

			if (thumb && thumb.attr('data-crop') && JSON.parse(thumb.attr('data-crop'))) {
				rto = false;
				if (JSON.parse(thumb.attr('data-ratio'))) {
					var rto = parseInt(thumb.attr('data-width')) / parseInt(thumb.attr('data-height'));
				}

				thumb.find('img').cropper({
					aspectRatio: rto,
					viewMode: 3,
					zoomable: false,
					zoomOnWheel: false,
					zoomOnTouch: false,
					wheelZoomRatio: false,
					minCanvasWidth: 140,
					minCanvasHeight: 160,
					background: false,
					crop: function (data) {
						img = $(data.target).closest('.fileupload').find('input[type="file"]');

						$("." + img[0].id + ".coord-x").val(data.detail.x);
						$("." + img[0].id + ".coord-y").val(data.detail.y);
						$("." + img[0].id + ".coord-w").val(data.detail.width);
						$("." + img[0].id + ".coord-h").val(data.detail.height);
					},
				});
			}
		}).on('clear.bs.fileupload', function (e) {
		});
	}

	$(document).on('show.bs.modal', '.crop-modal', function () {
		$(".ordenable").sortable("disable");
		$(".ordenable-table").sortable("disable");

		var rto = parseInt($(this).find('img').attr('data-width')) / parseInt($(this).find('img').attr('data-height'));

		$(this).find('.crop-image').cropper({
			aspectRatio: rto,
			viewMode: 3,
			zoomable: false,
			zoomOnWheel: false,
			zoomOnTouch: false,
			wheelZoomRatio: false,
			minCanvasWidth: 140,
			minCanvasHeight: 160,
			background: false,
			crop: function (data) {
				form = $(data.target).closest('form');

				form.find(".coord-x").val(data.detail.x);
				form.find(".coord-y").val(data.detail.y);
				form.find(".coord-w").val(data.detail.width);
				form.find(".coord-h").val(data.detail.height);
			},
		});
	}).on('hide.bs.modal', function () {
	});

	/* --- / FILEUPLOAD --- */

	/* --- MASKS --- */

	if ($('input[class*="mask"]').length > 0) {

		$("input.mask-month").mask('00/0000', {
			clearIfNotMatch: false,
		});

		$("input.mask-date").mask('00/00/0000', {
			clearIfNotMatch: false,
		});

		$("input.mask-datetime").mask('00/00/0000 00:00', {
			clearIfNotMatch: false,
		});

		var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
			spOptions = {
				onKeyPress: function (val, e, field, options) {
					field.mask(SPMaskBehavior.apply({}, arguments), options);
				}
			};
		$('input.mask-phone').mask(SPMaskBehavior, spOptions);

		$("input.mask-cpf").mask('000.000.000-00', {
			clearIfNotMatch: false,
		});

		$("input.mask-cnpj").mask('00.000.000/0000-00', {
			clearIfNotMatch: false,
		});

		$("input.mask-zip-code").mask('00000-000');

		$("input.mask-number").mask('0#');

		$('input.mask-number-float').mask("0zzzzzzz,zz", {
			reverse: false,
			clearIfNotMatch: false,
			translation: {
				'z': {
					pattern: /[0-9]/,
					optional: true
				}
			}
		});

		$('input.mask-long-number-float').mask("0zzzzzzzzzz,zzz", {
			reverse: false,
			clearIfNotMatch: false,
			translation: {
				'z': {
					pattern: /[0-9]/,
					optional: true
				}
			}
		});

		$('input.mask-short-number-float').mask("0zzzzzzzzzz,z", {
			reverse: false,
			clearIfNotMatch: false,
			translation: {
				'z': {
					pattern: /[0-9]/,
					optional: true
				}
			}
		});
	}

	/* --- / MASKS --- */

	/* --- CKEDITOR --- */

	var defaultToolbar = ('Bold,Italic,Cut,Copy,Paste,Anchor,Underline,Strike,Subscript,Superscript,Table,Outdent,Indent,Anchor,Font,NumberedList,BulletedList,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Link,Unlink,Image,FontSize,TextColor,BGColor,Youtube,Format').split(',');

	if ($(".editor").length) {
		$(".editor").each(function () {
			var that = this;

			var toolbar = $(that).data('toolbar') ? $(that).data('toolbar').split(',') : [];
			var removeButtons = defaultToolbar.filter(x => !toolbar.includes(x)).join(',');

			var colors = $(that).data('colors');

			CKEDITOR.timestamp = 'v011';
			CKEDITOR.replace($(that).attr('id'), {
				wordcount: {
					showParagraphs: false, // Whether or not you want to show the Word Count
					showWordCount: true, // Whether or not you want to show the Char Count
					showCharCount: true, // Whether or not you want to count Spaces as Chars
					countSpacesAsChars: true, // Whether or not to include Html chars in the Char Count
					countHTML: false, // Maximum allowed Word Count, -1 is default for unlimited
					maxWordCount: -1, // Maximum allowed Char Count, -1 is default for unlimited
					maxCharCount: (typeof $(this).attr('maxlength') == 'string') ? $(this).attr('maxlength') : -1,
				},
				removeButtons: removeButtons,
				colorButton_colors: colors,
			});
			CKEDITOR.add;
			CKEDITOR.on('instanceReady', function () {
			});
		});
	}

	if ($(".inline-editor").length) {
		$(".inline-editor").each(function () {
			var that = this;

			var toolbar = $(that).data('toolbar') ? $(that).data('toolbar').split(',') : [];
			var removeButtons = defaultToolbar.filter(x => !toolbar.includes(x)).join(',');

			CKEDITOR.inline($(that).attr('id'), {
				wordcount: {
					showParagraphs: false, // Whether or not you want to show the Word Count
					showWordCount: false, // Whether or not you want to show the Char Count
					showCharCount: false, // Whether or not you want to count Spaces as Chars
					countSpacesAsChars: false, // Whether or not to include Html chars in the Char Count
					countHTML: false, // Maximum allowed Word Count, -1 is default for unlimited
					maxWordCount: -1, // Maximum allowed Char Count, -1 is default for unlimited
					maxCharCount: (typeof $(this).attr('maxlength') == 'string') ? $(this).attr('maxlength') : -1,
				},
				removeButtons: 'Sourcedialog,' + removeButtons,
				autoParagraph: false,
				enterMode: CKEDITOR.ENTER_BR,
				shiftEnterMode: CKEDITOR.ENTER_BR,
				coreStyles_bold: {
					element: 'b',
				},
				disallowedContent: 'br',
			});
			CKEDITOR.add;
			CKEDITOR.on('instanceReady', function () {
			});
		});
	}

	/* --- / CKEDITOR --- */

	/* --- SENDER FORM --- */

	// var sending = false;
	// $(document).on('submit', 'form', function(event) {
	// 	if (!$(this).hasClass('no-ajax')) {
	// 		event.preventDefault();

	// 		var that  = this;

	// 		if (!sending) {
	// 			if (typeof CKEDITOR != 'undefined') {
	// 				for (instance in CKEDITOR.instances) {
	// 					CKEDITOR.instances[instance].updateElement();
	// 				}
	// 			}

	// 			sending = true;
	// 			var formData = new FormData(this);

	// 			var oldPercent = 0;

	// 			$.ajax({
	// 				url: $(that).attr('action'),
	// 				type: 'POST',
	// 				data: formData,
	// 				cache: false,
	// 				contentType: false,
	// 				processData: false,
	// 				beforeSend: function() {
	// 					$.mpb('show', {value: [0,0], speed: 10, state: 'success'});
	// 				},
	// 				xhr: function() {
	// 					var myXhr = $.ajaxSettings.xhr();
	// 					if (myXhr.upload) {
	// 						myXhr.upload.addEventListener('progress', function (e) {
	// 							if (e.lengthComputable) {
	// 								var percentComplete = e.loaded / e.total;
	// 								$.mpb('update',{value: [oldPercent, Math.round(percentComplete * 100)],speed: 5});
	// 								oldPercent = Math.round(percentComplete * 100);
	// 							}
	// 						}, false);
	// 					}
	// 					return myXhr;
	// 				},
	// 				success: function (data) {
	// 					// $("html").html(data);
	// 					console.log(data);

	// 					if (data) {
	// 						alertSystem(data.type, data.title, data.msg, data.url);

	// 						if (data.type == 'success') {
	// 							if($(".icheckbox").length > 0) {
	// 								$('.icheckbox').iCheck('update');
	// 							}

	// 							if($(".iradio").length > 0) {
	// 								$('.iradio').iCheck('update');
	// 							}
	// 						}

	// 						$.mpb('destroy');
	// 						oldPercent = 0;
	// 						sending = false;
	// 					}
	// 				},
	// 				error: function (data) {
	// 					console.log(data);
	// 					alertSystem(data.type = 'error', data.title = 'Oops...', data.msg = Object.values(data.responseJSON.errors)[0][0], data.url = false);

	// 					$.mpb('destroy');
	// 					oldPercent = 0;
	// 					sending = false;
	// 				}
	// 			});
	// 		}
	// 	}
	// });

	/* --- / SENDER FORM --- */

	/* --- VISIBILITY --- */

	$(document).on('change', 'form.visibilidade', function () {
		var formData = new FormData(this);
		var that = this;
		var oldPercent = 0;

		$.ajax({
			url: $(that).attr('action'),
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function () {
				$.mpb('show', { value: [0, 0], speed: 10, state: 'success' });
			},
			xhr: function () {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					myXhr.upload.addEventListener('progress', function (e) {
						if (e.lengthComputable) {
							var percentComplete = e.loaded / e.total;
							$.mpb('update', { value: [oldPercent, Math.round(percentComplete * 100)], speed: 5 });
							oldPercent = Math.round(percentComplete * 100);
						}
					}, false);
				}
				return myXhr;
			},
			success: function (data) {
				if (data) {
					// data = JSON.parse(data);

					$(that).find('input[type="checkbox"]').prop('checked', data.type == 'success' ? !!(data.active) : !(data.active));

					$.mpb('destroy');
					oldPercent = 0;
				}
			},
			error: function (data) {
				console.log(data);
			}
		});
	});

	/* --- DATETIMEPICKER --- */

	if ($('.datetime-picker').length > 0) {
		$('.datetime-picker').datetimepicker({
			locale: 'pt-br',
			// minDate: currentDate(),
			showClose: true,
			showTodayButton: true,
			showClear: true,
			icons: {
				close: 'fa fa-check'
			},
		});
	}

	if ($('.date-picker').length > 0) {
		$('.date-picker').datetimepicker({
			locale: 'pt-br',
			format: 'DD/MM/YYYY',
			// minDate: currentDate(),
			showClose: true,
			showTodayButton: true,
			showClear: true,
			icons: {
				close: 'fa fa-check'
			},
		});
	}

	if ($('.month-picker').length > 0) {
		$('.month-picker').datetimepicker({
			locale: 'pt-br',
			format: 'MM/YYYY',
			// minDate: currentDate(),
			showClose: true,
			showTodayButton: false,
			showClear: true,
			icons: {
				close: 'fa fa-check'
			},
		});
	}

	/* --- / DATETIMEPICKER --- */

	/* --- / VISIBILITY --- */

	// $(".programing-form").each(function(){
	// 	$(this).find("input").datetimepicker({
	// 		locale: 'pt-br',
	// 		// minDate: currentDate(),
	// 		showClose: true,
	// 		showTodayButton: true,
	// 		showClear: true,
	// 		icons: {
	// 			close: 'fa fa-check'
	// 		}
	// 	}).on('blur', function(){
	// 		$.ajax({
	// 			url: $(this).closest('form').attr('action'),
	// 			type: $(this).closest('form').attr('method'),
	// 			data: $(this).closest('form').serialize(),
	// 			beforeSend: function(){
	// 			},
	// 			success: function(data){
	// 				if (data) {
	// 					console.log(data);
	// 					data = JSON.parse(data);
	// 					alertSystem(data.type, data.title, data.msg);
	// 				}
	// 				else {
	// 					alertSystem('error', 'Oops...', 'Ocorreu um erro. Tente novamente mais tarde.');
	// 				}
	// 			},
	// 		});
	// 	});
	// });

	/* --- INPUT-COUNTER --- */

	if ($(".input-counter").length) {
		$(".input-counter").each(function () {
			$(this).characterCounter({
				counterWrapper: 'span',
				counterCssClass: 'input-counter',
				increaseCounting: true,
				limit: false,
			});
		});
	}

	/* --- / INPUT-COUNTER --- */

	/* --- MULTISELECT --- */

	if ($(".multiselect").length) {
		$('.multiselect').multiSelect({
			selectableHeader: '<input type="text" class="search-input form-control form-control-xs push-down-5" autocomplete="off" placeholder="Pesquisar..."> <div style="background: #f5f5f5; padding: 5px 10px; margin: 0 0 -1px 0; border: 1px solid #ccc; border-radius: 4px 4px 0 0; color: #7f7f7f;">Itens selecionáveis</div>',
			selectionHeader: '<input type="text" class="search-input form-control push-down-5" autocomplete="off" placeholder="Pesquisar..."> <div style="background: #f5f5f5; padding: 5px 10px; margin: 0 0 -1px 0; border: 1px solid #ccc; border-radius: 4px 4px 0 0; color: #7f7f7f;">Itens selecionados</div>',
			afterInit: function (ms) {
				var that = this,
					$selectableSearch = that.$selectableUl.prev(),
					$selectionSearch = that.$selectionUl.prev(),
					selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
					selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

				that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
					.on('keydown', function (e) {
						if (e.which === 40) {
							that.$selectableUl.focus();
							return false;
						}
					});

				that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
					.on('keydown', function (e) {
						if (e.which == 40) {
							that.$selectionUl.focus();
							return false;
						}
					});
			},
			afterSelect: function () {
				this.qs1.cache();
				this.qs2.cache();
			},
			afterDeselect: function () {
				this.qs1.cache();
				this.qs2.cache();
			}
		});
	}

	/* --- / MULTISELECT --- */
});


function getData(url, id) {
	$.ajax({
		url: `/${url}/editar/` + id,
		type: "GET",
		dataType: "json",
		data: {
			_token: token,
		},
		success: function (response) {
			console.log(response);
			if (response.descricao) {
				var editorId = `texto-${url}-modal-` + id;
				var editor = tinymce.get(editorId);
				if (editor) {
					editor.setContent(response.descricao);
				}
			}

			if (response.titulo) {
				$(".titulo").val(response.titulo);
			}

			if (response.data) {
				$(".data").val(response.data);
			}

			if (response.etiqueta) {
				$(".etiqueta").val(response.etiqueta);
			}

			if (response.email) {
				$(".email").val(response.email);
			}

			if (response.telefone) {
				$(".telefone").val(response.telefone);
			}

			if (response.cor) {
				$(".color").val(response.cor);
			}

			if (response.motivos && response.motivos.length > 0) {
				var $selectMotivo = $("select[name='editar_motivo_id']");
				$selectMotivo.empty();

				response.motivos.forEach(function (motivo) {
					var option = $('<option></option>')
						.attr('value', motivo.id)
						.text(motivo.titulo);
					$selectMotivo.append(option);
				});

				// Defina o motivo selecionado
				if (response.motivo_id) {
					$selectMotivo.val(response.motivo_id).trigger('change');
				}
			}
		},
	});
}

$(document).on('click', 'tr.trLink', function (event) {
	var elementClicked = event.target;
	if ($(elementClicked).is("a") || $(elementClicked).is("i")) {
		return;
	} else {
		var link = $(this).attr("data-href");
		window.location.href = link;
	}
});


$('.modal').on('show.bs.modal', function () {
	$(this).find('form').trigger('reset');
});

$(".deleteBtLink").on("click", function (e) {
	e.preventDefault();
	var url = $(this).attr("href");
	Swal.fire({
		title: "Deseja excluir?",
		icon: "question",
		text: "Por favor, certifique-se e depois confirme!",
		type: "warning",
		showCancelButton: !0,
		cancelButtonText: "Fechar",
		confirmButtonText: "Excluir",
		confirmButtonClass: "red-btn",
		reverseButtons: !0,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
});

$('#cep').on('change', function () {
	var cep = $(this).val();
	cep = cep.replace('-', '');
	$('#cidade').val(null);
	$('#uf').val(null);
	$('#bairro').val(null);
	$('#endereco').val(null);
	if (cep.length === 8) {
		$.ajax({
			url: 'https://viacep.com.br/ws/' + cep + '/json/',
			type: 'GET',
			dataType: 'json',
			beforeSend: function () {
				$('.loadingForm').show();
			},
			complete: function () {
				setTimeout(function () {
					$('.loadingForm').hide();
				}, 300);
			},
			success: function (response) {
				if (!response.erro) {
					$('#cidade').val(response.localidade);
					$('#uf').val(response.uf);
					$('#bairro').val(response.bairro);
					$('#endereco').val(response.logradouro);
				}
			}
		});
	}
});

document.addEventListener('DOMContentLoaded', function () {
	// Format function for Brazilian currency
	function formatCurrency(value) {
		return 'R$ ' + value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
	}

	// Initialize CountUp.js counters
	document.querySelectorAll('[data-kt-countup]').forEach(function (element) {
		var endValue = parseFloat(element.getAttribute('data-kt-countup-value')) || 0;
		var countUp = new CountUp(element, 0, endValue, 2, 2, {
			prefix: element.getAttribute('data-kt-countup-prefix') || '',
			formattingFn: formatCurrency
		});
		countUp.start();
	});
});


$(document).ready(function () {

	$('.dropdown-toggle').click(function(e) {
		e.stopPropagation();
		$('.dropdown-menu').toggleClass('show');
	});
	
	$(document).on('click', function(evt) {
		if($('.dropdown-menu').hasClass('show')) {
			if(!$(evt.target).is('.dropdown-menu')) {
				$('.dropdown-menu').removeClass('show');
			} 
		}
	});

	$('.meuSelect').multiSelect({
		keepOrder: true,
		selectableHeader:
		"<div class='custom-header' style='margin-bottom:10px;'>Disponíveis:</div>" +
		"<input type='text' class='form-control form-control-solid' style='margin-bottom:10px;' autocomplete='off' placeholder='Buscar...'>",
		selectionHeader:
		"<div class='custom-header' style='margin-bottom:10px;'>Selecionados:</div>" +
		"<input type='text' class='form-control form-control-solid' style='margin-bottom:10px;' autocomplete='off' placeholder='Buscar...'>",
		afterInit: function (ms) {
		const that = this,
			$selectableSearch = that.$selectableUl.prev(),
			$selectionSearch = that.$selectionUl.prev(),
			selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
			selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

		// Busca nos disponíveis
		that.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('keydown', function (e) {
			if (e.which === 40) {
			that.$selectableUl.focus();
			return false;
			}
		});

		// Busca nos selecionados
		that.qs2 = $selectionSearch.quicksearch(selectionSearchString).on('keydown', function (e) {
			if (e.which == 40) {
			that.$selectionUl.focus();
			return false;
			}
		});
		},
		afterSelect: function () {
		this.qs1.cache();
		this.qs2.cache();
		},
		afterDeselect: function () {
		this.qs1.cache();
		this.qs2.cache();
		}
	});

	setTimeout(function () {
        $(".selectAtributo").each(function () {
            const $select = $(this);
            const value = $select.val();

            // Container visual do select2
            const $select2Container = $select.siblings('.select2').find('.select2-selection');

            if (!value) {
                $select2Container.css('border', '1px solid #e2231a');
            } else {
                $select2Container.css('border', '');
            }
        });
    }, 100);

	setTimeout(function () {
        $(".textAtributo").each(function () {
            const $text = $(this);
            const value = $text.val();

            // Container visual do select2

            if (!value) {
                $text.css('border', '1px solid #e2231a');
            } else {
                $text.css('border', '');
            }
        });
    }, 100);
        
	$(".selectAtributo").on("change", function () {
		let observacao = $(this).find(":selected").data("observacao") || "";
		let observacaoDiv = $(this).closest(".fv-row").find(".observacao");
		let observacaoText = observacaoDiv.find(".observacaoText");
		let valorSelect = $(this).val();

		let $select2 = $(this).next('.select2').find('.select2-selection');
		let $select2Text = $(this).next('.select2').find('.select2-selection__rendered');

		if (valorSelect) {
			$select2.css('background-color', '#a1a5b7');
			$select2.css('border', '');
			$select2Text.css('color', 'white');
		} else {
			$select2.css('background-color', '#f5f8fa');
			$select2Text.css('color', '#a1a5b7');
			$select2.css('border', '1px solid #e2231a');

		}

		if (observacao.trim() !== "") {
			observacaoText.text(observacao);
			observacaoText.toggleClass("italic");
			observacaoDiv.show(); 
		} else {
			observacaoDiv.hide(); 
		}

	});

	$(".textAtributo").on('input',function(e){
		if($(this).val().length > 0){
			$(this).css('background-color', '#a1a5b7');
			$(this).css('border', '');

			$(this).css('color', 'white');
		}else{
			$(this).css('background-color', '#f5f8fa');
			$(this).css('color', '#a1a5b7');
			$(this).css('border', '1px solid #e2231a');
		}
	});
	

	document.addEventListener('DOMContentLoaded', e => {
		$('#input-datalist').autocomplete()
	}, false);

	$('.openSide').on('click', function () {
		$('.sidenav').toggleClass('sidenavAcitve');
	});

	$('.closeSide').on('click', function () {
		$('.sidenav').toggleClass('sidenavAcitve');
	});

	$(document).on('click', function (event) {
		if (!$(event.target).closest('.sidenav, .openSide, .ranges, .daterangepicker, .drp-calendar, .prev, .next, .select2-search__field').length) {
			if ($('.sidenav').hasClass('sidenavAcitve')) {
				$('.sidenav').removeClass('sidenavAcitve');
			}
		}
	});

	$('input.filter-daterangepicker').daterangepicker({
		locale: {
			format: 'DD/MM/YYYY',
			separator: ' - ',
			applyLabel: 'Aplicar',
			cancelLabel: 'Cancelar',
			fromLabel: 'De',
			toLabel: 'Até',
			customRangeLabel: 'Período personalizado',
			weekLabel: 'W',
			daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
			monthNames: [
				'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
				'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
			],
			firstDay: 0
		},
		autoUpdateInput: false,
		ranges: {
			'Hoje': [moment(), moment()],
			'Esta semana': [moment().startOf('week'), moment().endOf('week')],
			'Este mês': [moment().startOf('month'), moment().endOf('month')],
			'Últimos 7 dias': [moment().subtract(6, 'days'), moment()],
			'Últimos 14 dias': [moment().subtract(13, 'days'), moment()],
			'Últimos 30 dias': [moment().subtract(29, 'days'), moment()],
			'Últimos 6 meses': [moment().subtract(6, 'months').startOf('month'), moment()]
		}
	}, function (start, end) {
	});

	$('input.filter-daterangepicker').on('apply.daterangepicker', function (ev, picker) {
		$(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
	});

	$('input.filter-daterangepicker').on('cancel.daterangepicker', function (ev, picker) {
		$(this).val('');
	});

	$('[data-control="select2"]').select2({
		placeholder: function () {
			return $(this).data('placeholder');
		},
		allowClear: true
	});

});

tinymce.init({
	selector: ".ckText",
	language: "pt_BR",
	height: 350,
	browser_spellcheck: true,
	menubar: true,
	plugins: [
		"lists",
		"charmap", "hr", "anchor", "pagebreak", "spellchecker",
		"searchreplace", "autolink", "wordcount", "visualblocks", "visualchars",
		"code", "fullscreen", "media", "nonbreaking",
		"save", "table", "contextmenu", "directionality", "template", "paste", "textcolor",
		"link", "image", "emoticons", "fontfamily", "fontsize" // adicionado aqui
	],
	toolbar:
		"insertfile undo redo | styleselect fontselect fontsizeselect | bold strikethrough italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | forecolor backcolor emoticons | fullscreen code",

	fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
	font_family_formats: "Arial=arial,helvetica,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Times New Roman=times new roman,times;Verdana=verdana,geneva",

	automatic_uploads: true,
	image_advtab: true,
	image_dimensions: true,
	file_picker_types: 'image',
	file_picker_callback: function (cb, value, meta) {
		var input = document.createElement('input');
		input.setAttribute('type', 'file');
		input.setAttribute('accept', 'image/*');
		input.onchange = function () {
			var file = this.files[0];

			var formData = new FormData();
			formData.append('file', file);

			fetch('/upload-imagem', {
				method: 'POST',
				body: formData,
				headers: {
					'X-CSRF-TOKEN': token
				},
			})
				.then(response => response.json())
				.then(data => {
					cb(data.location, { title: file.name });
				});
		};

		input.click();
	},

	setup: function (editor) {
		editor.on('drop', function (event) {
			var file = event.dataTransfer.files[0];
			if (file.type.startsWith('image/')) {
				var formData = new FormData();
				formData.append('file', file);

				fetch('/upload-imagem', {
					method: 'POST',
					body: formData,
					headers: {
						'X-CSRF-TOKEN': token
					},
				})
					.then(response => response.json())
					.then(data => {
						var imgBlob = editor.dom.select('img[src^="blob:"]');
						imgBlob.forEach(img => img.remove());
						editor.insertContent(`<img src="${data.location}" alt="${file.name}"/>`);
					});
			}
		});

		editor.on('paste', function (event) {
			var items = (event.clipboardData || event.originalEvent.clipboardData).items;
			for (index in items) {
				var item = items[index];
				if (item.kind === 'file' && item.type.startsWith('image/')) {
					var blob = item.getAsFile();
					var formData = new FormData();
					formData.append('file', blob);

					fetch('/upload-imagem', {
						method: 'POST',
						body: formData,
						headers: {
							'X-CSRF-TOKEN': token
						},
					})
						.then(response => response.json())
						.then(data => {
							var imgBlob = editor.dom.select('img[src^="blob:"]');
							imgBlob.forEach(img => img.remove());
							editor.insertContent(`<img src="${data.location}" alt="${blob.name}"/>`);
						});
				}
			}
		});
	}
});

document.addEventListener('focusin', (e) => {
	if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
		e.stopImmediatePropagation();
	}
});


$(document).ready(function () {
	//AJAX
	var csrfToken = $('input[name="_token"]').val();

	$('.check-reuniao').on('change', function () {
		let selectedValue = $(this).is(':checked') ? 1 : 0;

		if (selectedValue == 1) {
			$(this).closest('.card-deck').addClass('oldReuniao');
		} else {
			$(this).closest('.card-deck').removeClass('oldReuniao');
		}

		var id = $(this).attr("data-reuniao")
		$.ajax({
			url: '/update-reuniao',
			type: "POST",
			dataType: "json",
			data: {
				_token: csrfToken,
				id
			},
			success: function (response) {
				if (response.success) {
					Swal.fire({
						title: response.title,
						icon: response.icon,
						text: response.message
					});
				}
			},
			error: function (error) {
				Swal.fire({
					icon: 'error',
					title: 'Erro',
					text: 'Não foi possível atualizar a reunião!',
				});
			}
		});
	});


	FilePond.registerPlugin(FilePondPluginImagePreview);

	document.querySelectorAll('.filepond').forEach(function (inputElement) {
		FilePond.create(inputElement, {
			allowMultiple: true,
			maxFileSize: '3MB',
			allowImagePreview: true,
			imagePreviewHeight: 150,
			labelIdle: `Arraste e solte suas imagens aqui!`,
			labelFileProcessingComplete: "Arquivo anexado",
			labelFileProcessing: "Carregando...",
			storeAsFile: true
		});
	});

	$("#image-input").on("change", function (event) {
		let file = event.target.files[0];

		if (file) {
			let reader = new FileReader();

			reader.onload = function (e) {
				$("#image-preview").attr("src", e.target.result);
				$(".removeCrop").show();
			};

			reader.readAsDataURL(file);
		}
	});

	$(".removeCrop").on("click", function () {
		$("#image-input").val(""); 
		$("#image-preview").attr("src", "{{ mixAssets('assets/img/logo-site.png') }}"); 
		$(".removeCrop").hide();
	});
});

