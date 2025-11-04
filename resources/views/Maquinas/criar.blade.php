@extends('layouts.admin')
@section('title', 'Criar máquina')

@section('css')
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
                                <form class="form responseAjax" method="POST" action="{{route('Maquinas.criar_action')}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Crie uma máquina</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="row imgArea mt-12">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span>Imagem</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <div class="fileupload-new thumbnail" data-kt-image-input="true">
                                                    <div class="bgCropper">
                                                        <img id="image-preview" src="{{ mixAssets('assets/img/logo-site.png') }}" style=" max-width: 480px; max-width: 100%;" alt="">
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow editCrop" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Mudar imagem">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>
                                                            <input type="file" id="image-input" name="imagem" accept="image/*" style="display: none;">
                                                        </label>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow removeCrop" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Remover imagem" style="display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f1416c" style="border-radius: 25px;" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="cropped-image" name="cropped_image">
                                                <button type="hidden" id="trocar-button" style="display: none;">Trocar</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                        <div class="col-md-4 fv-row selectArea">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Equipamento de origem</span>
                                            </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar equipamento" name="equipamento_id">
                                                <option></option>
                                                @foreach($equipamentos as $item)
                                                    <option value="{{$item->id}}">
                                                        {{ optional($item->equipamentosOrigemIdiomas->first())->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">NCM</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo ncm" name="ncm" />
                                        </div>
                                        <div class="col-md-12 fv-row selectArea criarSelect">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Amostras</span>
                                            </label>
                                            <select multiple="multiple" class="meuSelect" data-placeholder="Selecionar amostras(s)" name="amostras[]">
                                                <option></option>
                                                @foreach($amostras as $item)
                                                    <option value="{{$item->id}}">
                                                        {{ optional($item->amostrasIdiomas->first())->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 fv-row selectArea criarSelect">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Produtos</span>
                                            </label>
                                            <select multiple="multiple" class="meuSelect" data-placeholder="Selecionar produtos(s)" name="produtos[]">
                                                <option></option>
                                                @foreach($produtos as $item)
                                                    <option value="{{$item->id}}">
                                                        {{ optional($item->produtosIdiomas->first())->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 fv-row selectArea criarSelect">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Características</span>
                                            </label>
                                            <select multiple="multiple" class="meuSelect" data-placeholder="Selecionar característica(s)" name="caracteristicas[]">
                                                <option></option>
                                                @foreach($caracteristicas as $item)
                                                    <option value="{{$item->id}}">
                                                        {{ optional($item->caracteristicasIdiomas->first())->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-8 fv-row ckEditorView">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="notRequired">Observações</span>
                                            </label>
                                            <textarea name="observacao" id="texto-2" class="form-control ckText"></textarea>
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

@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
    
    $(document).ready(function() {
        
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

        const defaultImage = "{{ mixAssets('assets/img/logo-site.png') }}/";

        $(".removeCrop").on("click", function () {
            $("#image-input").val(""); 
            $("#image-preview").attr("src", defaultImage); 
            $(".removeCrop").hide();
        });
        
    });

</script>
@endsection