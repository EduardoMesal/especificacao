@extends('layouts.admin')
@section('title', 'Criar atributo da produto ' . optional($produto->produtosIdiomas->first())->nome)

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
                                <form class="form responseAjax" method="POST" action="{{route('Produtos.criar_atributo_action', ['id' => $produto->id])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Criar atributo(s)</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-4 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" list="list-input" id="input-datalist" placeholder="Preencha o campo nome" name="nome" />
                                            <datalist id="list-input">
                                              @foreach ($atributosProdutos as $a)
                                                <option>{{optional($a->atributosProdutosIdiomas->first())->nome}}</option>
                                              @endforeach
                                            </datalist>
                                        </div>
                                        <div class="col-md-4 fv-row selectArea">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Tipo</span>
                                            </label>
                                            <select class="form-select form-select-solid tipo" data-control="select2" data-hide-search="true" data-placeholder="Tipo" name="tipo">
                                                <option value="selecionavel">Selecionável</option>
                                                <option value="multiplos">Múltiplos</option>
                                                <option value="texto">Texto</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 fv-row selectArea">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Unidade</span>
                                            </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar unidade" name="unidade">
                                                <option></option>
                                                <option value="kg">kg</option>
                                                <option value="Hz">Hz</option>
                                                <option value="mm">mm</option>
                                                <option value="f/h">f/h</option>
                                                <option value="ml">ml</option>
                                                <option value="g">g</option>
                                                <option value="V">V</option>
                                                <option value="vol./min">vol./min</option>
                                                <option value="un/min">un/min</option>
                                                <option value="m²">m²</option>
                                                <option value="m³">m³</option>
                                                <option value="°c">°c</option>
                                                <option value="un/h">un/h</option>
                                                <option value="un">un</option>
                                                <option value="p/h">p/h</option>
                                                <option value="l/h">l/h</option>
                                                <option value="%">%</option>
                                                <option value="gCO2/l">gCO2/l</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 fv-row obsTexto" style="display:none">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Observação</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo observação" name="observacao" />
                                        </div>
                                        <div id="att" class="mt-8">
                                            <div class="form-group">
                                                <div data-repeater-list="att">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-6 mb-md-0 mb-5">
                                                                <label class="form-label required">Atributo</label>
                                                                <input name="atributo" class="form-control form-control-solid" type="text" placeholder="Atributo" />
                                                            </div>
                                                            <div class="col-md-6 mt-md-0 mt-5">
                                                                <label class="form-label">Observação</label>
                                                                <input name="observacao_selecionavel" class="form-control form-control-solid" type="text" placeholder="Observação" />
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3">
                                                                    <i class="ki-duotone ki-trash fs-3"></i> Remover
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="javascript:void(0);" data-repeater-create class="btn btn-flex btn-light-primary mt-5 addRepeater">
                                                    <i class="ki-duotone ki-plus fs-3"></i> Adicionar atributo
                                                </a>
                                            </div>
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
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>
<script src="{{ mixAssets('/assets/js/closeSave.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#select2Multiple').select2({
            minimumResultsForSearch: Infinity,
            language: 'pt-BR'
        });

        let primeiroItem = $("#att [data-repeater-item]").first().clone(); 

        $(".tipo").on("change", function () {
            let valor = $(this).val();
            let attDiv = $("#att");
            let attSemRepeater = $("#attSemRepeater");
            let obsTexto = $(".obsTexto");

            if (valor == "texto") {
                obsTexto.show();
                attDiv.find("[data-repeater-item]").remove();
                attDiv.hide(); 
            } else {
                if (attDiv.find("[data-repeater-item]").length === 0) {
                    attDiv.find("[data-repeater-list]").append(primeiroItem.clone());
                }
                attDiv.show(); 
                obsTexto.hide();
            }
        });

    });
</script>
@endsection