@extends('layouts.admin')
@section('title', 'Editar produto')

@section('css')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start flex-wrap mb-2">
                            <div class="flex-column">
                                <form class="form responseAjax" method="POST" action="{{route('Especificacoes.editar_produto_action', ['id' => $atributoProduto->id])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-between align-items-center mb-8">
                                        <div class="d-flex justify-content-center gap-2 align-items-center">
                                            <h1 style="margin:0px;" class="">{!! optional($produto->produtosIdiomas->first())->nome !!}</h1>
                                            @if(optional($produto->produtosIdiomas->first())->aviso)
                                            <p style="margin-bottom: 0px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAviso--{{$produto->id}}">
                                                <i class="bi bi-info-square-fill"></i>
                                            </p>
                                            <div class="modal fade modalHeight" id="modalAviso--{{$produto->id}}" role="dialog">
                                                <div class="modal-dialog modal-xl d-flex align-items-center justify-content-center" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title align-self-center" id="modalAviso--{{$produto->id}}">Aviso</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body modal-imagem-aviso">
                                                            <div class="row">
                                                                <div class="col-md-12 col-xl-12">
                                                                    {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($produto->produtosIdiomas->first())->aviso) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <a class="btn btn-sm btn btn-primary" href="{{ route('Especificacoes.especificacao', ['id' => $atributoProduto->especificacao_id]) }}">Voltar</a>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        @foreach($produto->atributos as $key => $a)
                                            <input type="hidden" name="produtosAtributo[{{ $key }}][atributo_produto_id]" value="{{ $a->id }}">
                                          
                                            @if($a->tipo == 'multiplos')
                                                <div class="col-md-12 clearfix d-flex gap-2 align-itens-center">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span>{{ optional($a->atributosProdutosIdiomas->first())->nome }} @if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                    </label>
                                                    <div style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalImagem--{{$a->id}}">
                                                        <i class="bi bi-image-fill"></i>
                                                    </div>
                                                </div>
                                                @foreach($a->subAtributos as $sub)
                                                    @php
                                                        $isSubResumo = $sub->especificacao->resumo ?? 0;
                                                    @endphp
                                                    <div class="col-md-6 fv-row">
                                                        <div class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                            <div class="d-flex gap-5 align-items-center">
                                                                <span>{!! optional($sub->subAtributosProdutosIdiomas->first())->nome !!}</span>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][subatributo_id]" value="{{ $sub->id }}" />
                                                        <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo valor" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][conteudo]" value="{{ $sub->especificacao->conteudo ?? '' }}" />
                                                        @if(optional($sub->subAtributosProdutosIdiomas->first())->observacao)
                                                        <div class="observacao mt-2 alert alert-warning mb-0">
                                                            <label class="d-flex align-items-center fs-6 fw-bold">
                                                                <span class="">Observação</span>
                                                            </label>
                                                            <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                                {{ optional($sub->subAtributosProdutosIdiomas->first())->observacao }}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-0 mb-md-8 fv-row adjustSpaceObs">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Observações</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][observacao_personalizada]" value="{{ $sub->especificacao->observacao_personalizada ?? '' }}" />
                                                    </div>
                                                @endforeach
                                            @elseif($a->tipo == 'texto')
                                                <div class="col-md-6 fv-row">
                                                    <div class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span>{!! optional($a->atributosProdutosIdiomas->first())->nome !!}@if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                            <div style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalImagem--{{$a->id}}">
                                                                <i class="bi bi-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo texto" name="produtosAtributo[{{ $key }}][conteudo]" value="{{ $a->atributoProdutoExpecificacoes->conteudo ?? '' }}" />
                                                    @if(optional($a->subAtributos->first()->subAtributosProdutosIdiomas->first())->observacao)
                                                    <div class="observacao mt-2 alert alert-warning mb-0">
                                                        <label class="d-flex align-items-center fs-6 fw-bold">
                                                            <span class="">Observação</span>
                                                        </label>
                                                        <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                            {{ optional($a->subAtributos->first()->subAtributosProdutosIdiomas->first())->observacao }}
                                                        </p>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-0 mb-md-8 fv-row adjustSpaceObs">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span>Observações</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][observacao_personalizada]" value="{{ $a->atributoProdutoExpecificacoes->observacao_personalizada ?? '' }}" />
                                                </div>
                                            @elseif($a->tipo == 'selecionavel')
                                                <div class="col-md-6 fv-row selectArea">
                                                    <div class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span>{!! optional($a->atributosProdutosIdiomas->first())->nome !!} @if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                            <div style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalImagem--{{$a->id}}">
                                                                <i class="bi bi-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <select class="form-select form-select-solid selectAtributo"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        data-placeholder="Selecionar atributo"
                                                        name="produtosAtributo[{{ $key }}][atributo_selecionavel][subatributo_id]">
                                                        <option></option>
                                                        @foreach($a->subAtributos as $subA)
                                                            <option value="{{ $subA->id }}" data-observacao="{{ optional($subA->subAtributosProdutosIdiomas->first())->observacao }}" 
                                                                {{ $subA->id == ($a->atributoProdutoExpecificacoes->sub_atributo_id ?? null) ? 'selected' : '' }}>
                                                                {!! optional($subA->subAtributosProdutosIdiomas->first())->nome !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                        <input type="hidden" name="produtosAtributo[{{ $key }}][atributo_selecionavel][old]" 
                                                        value="{{ $a->atributoProdutoExpecificacoes->sub_atributo_id ?? '' }}">
                                                    @php
                                                        $hasObs = optional($a->subAtributos->where('id', optional($a->atributoProdutoExpecificacoes)->sub_atributo_id)->first())->observacao ?? '';
                                                    @endphp

                                                    @php
                                                        $subAtributo = optional($a->subAtributos)
                                                            ->where('id', optional($a->atributoProdutoExpecificacoes)->sub_atributo_id)
                                                            ->first();

                                                        $hasObs = optional(
                                                            optional($subAtributo?->subAtributosProdutosIdiomas()
                                                                ->where('idioma_id', 1)
                                                                ->first())
                                                        )->observacao ?? '';
                                                    @endphp

                                                    <div class="observacao mt-2 {{$hasObs ? 'alert alert-warning' : ''}}">
                                                        @if($hasObs)
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span>Observação</span>
                                                            </label>
                                                            <p class="observacaoText italic">{!! $hasObs !!}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-0 mb-md-8 fv-row adjustSpaceObs">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span>Observações</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][observacao_personalizada]" value="{{ $a->atributoProdutoExpecificacoes->observacao_personalizada ?? '' }}" />
                                                </div>
                                                
                                            @endif
                                            <div class="modal fade modalHeight modalImagem" id="modalImagem--{{$a->id}}" role="dialog">
                                                <div class="modal-dialog modal-xl d-flex align-items-center justify-content-center" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title align-self-center">Imagens</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-8 fv-row ckEditorView">
                                                                    <div>
                                                                        <input type="file" 
                                                                            class="filepondAjax" 
                                                                            name="file"
                                                                            data-atributo-id="{{ $a->id }}" 
                                                                            data-indice-id="{{ $atributoProduto->id }}" 
                                                                            multiple>
                                                                    </div>
                                                                </div>
                                                                <div style="display: none;" class="form__error errorFilepond"></div>
                                                                <div style="padding:0px 10px;">
                                                                    <div class="alert alert-warning mb-4" role="alert">
                                                                        A imagem deve estar no formato jpg, png ou jpeg. Não exceder 3MB.
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h2>Imagens</h2>
                                                                </div>
                                                                <div class="schedules-area pt-7 imgsAmostra">
                                                                    <div class="row mb-6" id="contentSortableProjects">
                                                                        @if(count($a->imagens) > 0)
                                                                        @foreach ($a->imagens as $key => $item)
                                                                            <div class="col-md-6 col-xxl-3 mb-5 projectContent" id="img-{{ $item->id }}">
                                                                                <div class="card adjustCardUsers">
                                                                                    <div class="card-body d-flex flex-center flex-column " style="background-color: #f5f8fa;">
                                                                                        <img class="imgProject" src="{{ mixAssets('assets/img/produtos/atributos/' . $item->imagem) }}"/>
                                                                                        <div class="d-flex justify-content-end gap-2 align-items-center mt-4 mb-4" style="width: 100%;">
                                                                                            <button 
                                                                                                class="btn btn-sm btn-secondary deleteBt btn-secondary-delete btn-delete-imagem" 
                                                                                                type="button"
                                                                                                data-id="{{ $item->id }}">
                                                                                                <i class="bi bi-trash-fill"></i>Excluir
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @else
                                                                        <p>Nenhuma imagem inserida!</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-12 mb-8 fv-row imgArea">
                                            <input type="file" class="filepond" name="imagens[]" multiple>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                            <span class="indicator-label">Enviar</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="row gy-5 g-xl-10">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Imagens</h2>
                        </div>
                        <div class="schedules-area pt-7 imgsAmostra">
                            <div class="row mb-6" id="contentSortableProjects">
                                @if(count($atributoProduto->imagens) > 0)
                                    @foreach ($atributoProduto->imagens as $key => $item)
                                    <div class="col-md-4 col-xxl-3 mb-5 projectContent">
                                        <div class="card adjustCardUsers">
                                            <div class="card-body d-flex flex-center flex-column " style="background-color: #f5f8fa;">
                                                <img class="imgProject" src="{{ mixAssets('assets/img/produtos/' . $item->imagem) }}"/>
                                                <div class="d-flex justify-content-end gap-2 align-items-center mt-4 mb-4" style="width: 100%;">
                                                    <form class="responseAjax" action="{{route('Produtos.excluir_imagem', ['id' => $item->id])}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                            <i class="bi bi-trash-fill"></i>Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <p>Nenhuma imagem inserida!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('plugins')
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="{{ mixAssets('/assets/js/closeSave.js') }}"></script>
<script>
     $(document).ready(function() {

        $(document).on('change', '.selectAtributo', function() {
            let selectedOption = $(this).find('option:selected');
            let observacao = selectedOption.data('observacao') || '';

            $(this).closest('.col-md-6').find('.observacao').remove();

            if (observacao) {
                let observacaoHtml = `
                    <div class="observacao mt-2 alert alert-warning mb-0">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span>Observação</span>
                        </label>
                        <p class="observacaoText italic">${observacao}</p>
                    </div>
                `;
                $(this).closest('.col-md-6').append(observacaoHtml);
            }
        });

    });

    let modalAbertoId = null;

    document.addEventListener('shown.bs.modal', function (event) {
        const modal = event.target;
        modalAbertoId = modal.id;  
    });

    $('.form__error').click(function () {
        $(this).slideUp();
        $('.errorFilepond').css({
            'display': 'none',
            'opacity': '0',
            'margin-bottom': '0px',
        });
    });

    FilePond.registerPlugin(FilePondPluginImagePreview);

    document.querySelectorAll('.filepondAjax').forEach((input) => {
        const atributoId = input.dataset.atributoId;
        const indiceId = input.dataset.indiceId;

        FilePond.create(input, {
            allowMultiple: true,
            maxFileSize: '3MB',
            allowImagePreview: true,
            imagePreviewHeight: 150,
            labelIdle: `Arraste e solte suas imagens aqui ou clique`,
            server: {
                process: {
                    url: '/produtos/upload-atributo-imagens',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    ondata: (formData) => {
                        formData.append('atributo_id', atributoId);
                        formData.append('indice_id', indiceId);
                       
                        if (modalAbertoId) {
                            const modalAtual = document.getElementById(modalAbertoId);
                            const errorDiv = modalAtual.querySelector('.errorFilepond');
                            if (errorDiv) {
                                $(errorDiv).css({
                                    'display': 'none',
                                    'opacity': '0',
                                    'margin-bottom': '0px',
                                });
                            }
                        }

                        return formData;
                    },

                    onload: (response) => response,
                    onerror: (response) => {
                        try {
                            const json = JSON.parse(response);
                            let errorMsg = 'Erro ao enviar a imagem.';

                            if (json.message) errorMsg = json.message;

                            const modalAtual = document.getElementById(modalAbertoId);
                            const errorDiv = modalAtual.querySelector('.errorFilepond');

                            if (errorDiv) {
                                errorDiv.innerText = errorMsg;
                                $(errorDiv).css({
                                    'display': 'block',
                                    'opacity': '1',
                                    'margin-bottom': '20px',
                                    'margin-top': '0px',
                                });

                            }

                            return errorMsg;

                        } catch (e) {
                            return 'Erro inesperado.';
                        }
                    }
                },
                revert: null
            },
            storeAsFile: false
        });
    });

    $(document).on('click', '.btn-delete-imagem', function () {
        const imagemId = $(this).data('id');

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
            if (result.isConfirmed) {
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
                    url: `/produtos/excluir-atributo-imagem/${imagemId}`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            $(`#img-${imagemId}`).remove();

                            Swal.fire({
                                icon: 'success',
                                title: 'Excluído!',
                                text: 'A imagem foi removida com sucesso.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire('Erro!', 'Não foi possível excluir a imagem.', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Erro!', 'Erro inesperado ao tentar excluir.', 'error');
                    }
                });
            }
        });
    });

</script>
@endsection