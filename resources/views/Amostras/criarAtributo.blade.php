@extends('layouts.admin')
@section('title', 'Criar atributo da amostra ' . optional($amostra->amostrasIdiomas->first())->nome)

@section('css')
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div class="flex-grow-1">
                            <div class="justify-content-between align-items-start flex-wrap mb-2">
                                <div class="flex-column">
                                    <form class="form responseAjax" method="POST" action="{{route('Amostras.criar_atributo_action', ['id' => $amostra->id])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center">
                                            <h2 class="">Criar atributo(s)</h2>
                                        </div>
                                        <div class="row g-9">
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" class="bg-transparent" list="list-input" id="input-datalist" placeholder="Preencha o campo nome" name="nome" />
                                                <datalist id="list-input">
                                                @foreach ($atributosAmostras as $a)
                                                    <option>{{optional($a->atributosAmostrasIdiomas->first())->nome}}</option>
                                                @endforeach
                                                </datalist>
                                            </div>
                                            <div class="col-md-4 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Tipo</span>
                                                </label>
                                                <select class="form-select form-select-solid tipo" data-control="select2" data-hide-search="true" data-placeholder="Tipo" name="tipo">
                                                    <option value="selecionavel">Selecionável</option>
                                                    <option value="multiplos">Múltiplos</option>
                                                    <option value="texto">Texto</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 fv-row selectArea input-style-1">
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
                                            <div class="col-md-12 fv-row obsTexto input-style-1" style="display:none">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Observação</span>
                                                </label>
                                                <input type="text" class="bg-transparent" placeholder="Preencha o campo observação" name="observacao" />
                                            </div>
                                            <div id="att" class="">
                                                <div class="form-group">
                                                    <div data-repeater-list="att">
                                                        <div data-repeater-item>
                                                            <div class="form-group row input-style-1">
                                                                <div class="col-md-6 mb-md-0">
                                                                    <label class="form-label required">Atributo</label>
                                                                    <input name="atributo" class="bg-transparent" type="text" placeholder="Atributo" />
                                                                </div>
                                                                <div class="col-md-6 mt-md-0 mt-4">
                                                                    <label class="form-label">Observação</label>
                                                                    <input name="observacao_selecionavel" class="bg-transparent" type="text" placeholder="Observação" />
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 btn-remove">
                                                                        <i class="ki-duotone ki-trash fs-3"></i> Remover
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="javascript:void(0);" data-repeater-create class="btn btn-flex btn-light-primary addRepeater">
                                                        <i class="ki-duotone ki-plus fs-3"></i> Adicionar atributo
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">
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