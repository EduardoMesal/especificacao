$(document).ready(function(){

    $('form.responseAjax').off('submit').on('submit', function (event) {
        $(this).find('[data-repeater-item]').filter(function () {
            return $(this).css('display') === 'none';
        }).first().remove();
        
        event.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);
        if (cropper != null) {
            var croppedCanvas = cropper.getCroppedCanvas({
                width: imageInput.getAttribute('data-w'),
                height: imageInput.getAttribute('data-h'),
            });

            var croppedImage = croppedCanvas.toDataURL('image/' + originalImageExtension); 
            formData.append('cropped_image', croppedImage); 
        }

        Swal.fire({
            title: 'Aguarde',
            html: 'Enviando dados...',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $(window).off('beforeunload');

                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                    }).then(function () {
                        $(window).off('beforeunload');
                        
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                            if (response.reload !== false) {
                                location.reload();
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                    });
                    $(window).on('beforeunload');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var response = jqXHR.responseJSON;
                $(window).on('beforeunload');
                if (response && response.errors) {
                    var errors = response.errors;
                    Swal.fire({
                        title: response.title || 'Erro!',
                        text: response.message || 'Ocorreu um erro ao enviar os dados.',
                        icon: response.icon || 'error',
                    });

                    form.find('.form__error').remove();

                    // $.each(errors, function (key, value) {
                    //     var input = form.find('[name="' + key + '"], [name="' + key + '[]"]');
                    //     var errorMessage = $('<div class="form__error"></div>');
                    //     errorMessage.text(value[0]);

                    //     if (input.is('select')) {
                    //         input.closest('.selectArea').append(errorMessage);
                    //     } else if (input.is('textarea')) {
                    //         input.closest('.ckEditorView').append(errorMessage);
                    //         input.closest('.ckEditorView').on('click', function () {
                    //             errorMessage.slideUp();
                    //         });
                    //     } 
                    //     else if (input.attr('name') === 'logo') {
                    //         input.closest('.imgArea').after(errorMessage);
                    //     }
                    //     else if (input.is('file')) {
                    //         input.closest('.imgArea').after(errorMessage);
                    //     }
                    //     else {
                    //         input.after(errorMessage);
                    //     }

                    //     input.on('click change', function () {
                    //         errorMessage.slideUp();
                    //     });
                    // });


                    $.each(errors, function (key, value) {
                        // Remove qualquer índice de array (como .0, .1) para encontrar o campo
                        let baseName = key.replace(/\.\d+$/, '');
                        let input = form.find('[name="' + baseName + '[]"], [name="' + baseName + '"]');
                        
                        // Se não encontrou, tenta a versão com .*
                        if (input.length === 0 && key.includes('*')) {
                            baseName = key.replace(/\.\*$/, '');
                            input = form.find('[name="' + baseName + '[]"], [name="' + baseName + '"]');
                        }

                        if (input.length > 0) {
                            var errorMessage = $('<div class="form__error text-danger"></div>');
                            errorMessage.text(value[0]);

                            if (input.is('select')) {
                                // Para selects múltiplos
                                let selectContainer = input.closest('.selectArea');
                                selectContainer.append(errorMessage);
                                selectContainer.addClass('has-error');
                                
                                // Destaca o Select2
                                if (input.hasClass('select2-hidden-accessible')) {
                                    input.next('.select2-container').css('border-color', '#f1416c');
                                }
                            } else if (input.is('textarea')) {
                                input.closest('.ckEditorView').append(errorMessage);
                                input.closest('.ckEditorView').on('click', function () {
                                    errorMessage.slideUp();
                                });
                            } else if (input.attr('name') === 'logo') {
                                input.closest('.imgArea').after(errorMessage);
                            } else if (input.is('[type="file"]')) {
                                input.closest('.imgArea').after(errorMessage);
                            } else {
                                input.after(errorMessage);
                            }

                            input.on('click change', function () {
                                errorMessage.slideUp();
                            });
                        }
                    });

                    form.find('.form__error').click(function () {
                        $(this).slideUp();
                    });
                } else {
                    Swal.fire({
                        title: response.title || 'Erro!',
                        text: response.message || 'Ocorreu um erro ao enviar os dados.',
                        icon: response.icon || 'error',
                    });
                    $(window).on('beforeunload');
                }
            }
        });
    });

    $('#att').repeater({
		initEmpty: false,

		defaultValues: {
			'text-input': 'foo'
		},

		show: function () {
			$(this).slideDown();

			// Re-init select2
			$(this).find('[data-kt-repeater="select2"]').select2();

			// Re-init flatpickr
			$(this).find('[data-kt-repeater="text"]').flatpickr();

			// Re-init tagify
			new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
		},

		hide: function (deleteElement) {
			$(this).slideUp(deleteElement);
		},

		ready: function(){
			// Init select2
			$('[data-kt-repeater="select2"]').select2();

			// Init flatpickr
			$('[data-kt-repeater="text"]').flatpickr();

			// Init Tagify
			new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
		}
	});

    $('.templateItem').repeater({
		initEmpty: true,

		defaultValues: {
			'text-input': 'foo'
		},

		show: function () {
			$(this).slideDown();

			// Re-init select2
			$(this).find('[data-kt-repeater="select2"]').select2();

			// Re-init flatpickr
			$(this).find('[data-kt-repeater="text"]').flatpickr();

			// Re-init tagify
			new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
		},

		hide: function (deleteElement) {
			$(this).slideUp(deleteElement);
		},

		ready: function(){
			// Init select2
			$('[data-kt-repeater="select2"]').select2();

			// Init flatpickr
			$('[data-kt-repeater="text"]').flatpickr();

			// Init Tagify
			new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
		}
	});

    //CROP
    var cropper = null 
    var imageInput = document.getElementById('image-input');
    var imagePreview = document.getElementById('image-preview');
    var trocarButton = document.getElementById('trocar-button');
    var removeCrop = document.querySelector('.removeCrop');
    var originalImageSrc = imagePreview.src;
    var originalImageExtension = '';

    function initializeCropper() {
        if (cropper) {
            cropper.destroy(); 
        }
        cropper = new Cropper(imagePreview, {
            aspectRatio: imageInput.getAttribute('data-w') / imageInput.getAttribute('data-h'),
            viewMode: 1,
            zoomable: false,
            background: false,
        });
    }

    imageInput.addEventListener('change', function (e) {
        var files = e.target.files;

        if (files && files.length > 0) {
            var file = files[0];
            var reader = new FileReader();

            originalImageExtension = file.type.split('/')[1]; 

            reader.onload = function () {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
                imagePreview.style.maxWidth = '100%';
                trocarButton.style.display = 'none';
                initializeCropper(); 
                removeCrop.style.display = 'block'; 
            };

            reader.readAsDataURL(file);
        }
    });

    trocarButton.addEventListener('click', function () {
        imageInput.click();
    });

    removeCrop.addEventListener('click', function () {
        imagePreview.src = originalImageSrc; 
        imagePreview.style.maxWidth = '480px';
        removeCrop.style.display = 'none'; 
        if (cropper) {
            cropper.destroy();
            cropper = null
        }
    });

});

  //deletar
  $(".deleteBt").on("click", function (e) {
    e.preventDefault();
    var form = $(this).parents("form");
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
            form.submit();
        }
    });
});


// $('form.responseAjax').off('submit').on('submit', function (event) {
//     event.preventDefault();
    
//     var form = $(this);
//     var formData = new FormData(form[0]);

//     Swal.fire({
//         title: 'Aguarde',
//         html: 'Enviando dados...',
//         allowOutsideClick: false,
//         showConfirmButton: false,
//         didOpen: () => {
//             Swal.showLoading();
//         }
//     });

//     $.ajax({
//         url: form.attr('action'),
//         method: form.attr('method'),
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             if (response.success) {
//                 Swal.fire({
//                     title: response.title,
//                     text: response.message,
//                     icon: response.icon,
//                 }).then(function () {
//                     if (response.redirect) {
//                         window.location.href = response.redirect;
//                     } else {
//                         if (response.reload !== false) {
//                             location.reload();
//                         }
//                     }
//                 });
//             } else {
//                 Swal.fire({
//                     title: response.title,
//                     text: response.message,
//                     icon: response.icon,
//                 });
//             }
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             var response = jqXHR.responseJSON;

//             if (response && response.errors) {
//                 var errors = response.errors;
//                 Swal.fire({
//                     title: response.title || 'Erro!',
//                     text: response.message || 'Ocorreu um erro ao enviar os dados.',
//                     icon: response.icon || 'error',
//                 });

//                 form.find('.form__error').remove();

//                 // Preencha as mensagens de erro nos campos de formulário correspondentes
//                 $.each(errors, function (key, value) {
//                     var input = form.find('[name="' + key + '"]');
//                     var errorMessage = $('<div class="form__error"></div>');
//                     errorMessage.text(value);

//                     if (input.is('select')) {
//                         input.closest('.selectArea').append(errorMessage);
//                     } else if (input.is('textarea')) {
//                         input.closest('.ckEditorView').append(errorMessage);
//                         input.closest('.ckEditorView').on('click', function () {
//                             errorMessage.slideUp();
//                         });
//                     } 
//                     else if (input.attr('name') === 'logo' || input.attr('name') === 'cropped_image') {
//                         // Coloca a mensagem de erro depois da div logoArea
//                         input.closest('.logoArea').after(errorMessage);
//                     }
//                     else {
//                         input.after(errorMessage);
//                     }

//                     input.on('click change', function () {
//                         errorMessage.slideUp();
//                     });
//                 });

//                 form.find('.form__error').click(function () {
//                     $(this).slideUp();
//                 });
//             } else {
//                 Swal.fire({
//                     title: response.title || 'Erro!',
//                     text: response.message || 'Ocorreu um erro ao enviar os dados.',
//                     icon: response.icon || 'error',
//                 });
//             }
//         }
//     });
// });