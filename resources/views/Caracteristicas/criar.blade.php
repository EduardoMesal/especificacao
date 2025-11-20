@extends('layouts.admin')
@section('title', 'Criar característica')

@section('css')
@endsection

@section('content')
<div class="section pt-40" id="kt_post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div class="flex-grow-1">
                            <div class="justify-content-between align-items-start flex-wrap mb-2">
                                <div class="flex-column">
                                    <form class="form responseAjax" method="POST" action="{{route('Caracteristicas.criar_action')}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center d-flex justify-content-between align-items-center">
                                            <h2>Crie uma característica</h2>
                                            <div class="form-check-right">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label">Comparável</label>
                                                    <input type="hidden" name="comparavel" value="0">
                                                    <input class="form-check-input" type="checkbox" name="comparavel" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" class="bg-transparent" list="list-input" id="input-datalist" placeholder="Preencha o campo nome" name="nome" />
                                                <datalist id="list-input">
                                                @foreach ($caracteristicas as $c)
                                                    <option>{{optional($c->caracteristicasIdiomas->first())->nome}}</option>
                                                @endforeach
                                                </datalist>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Tipo</span>
                                                </label>
                                                <select class="form-select form-select-solid tipo" data-control="select2" data-hide-search="true" data-placeholder="Selecionar tipo" name="tipo">
                                                    <option value="selecionavel">Selecionável</option>
                                                    <option value="multiplos">Múltipos</option>
                                                    <option value="texto">Texto</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Seção</span>
                                                </label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar seção" name="secao_id">
                                                    <option></option>
                                                    @foreach($secoes as $item)
                                                        <option value="{{$item->id}}">{{optional($item->secoesIdiomas->first())->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
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
                                            <div class="col-md-12 mb-8 fv-row ckEditorView">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="notRequired">Avisos</span>
                                                </label>
                                                <textarea name="aviso" id="texto-2" class="form-control ckText">
                                                </textarea>
                                            </div>
                                            <div class="col-md-12 fv-row obsTexto input-style-1" style="display:none">
                                                <label class="d-flex align-items-center fs-6 fw-bold pt-30">
                                                    <span class="">Observação</span>
                                                </label>
                                                <input type="text" class="bg-transparent" placeholder="Preencha o campo observação" name="observacao" />
                                            </div>
                                            <div id="att" class="pt-30">
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
                                                                    <input name="observacao" class="bg-transparent" type="text" placeholder="Observação" />
                                                                </div>
                                                                <div class="">
                                                                    <a href="javascript:avoid;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 btn-remove">
                                                                        <i class="ki-duotone ki-trash fs-3"></i>
                                                                        Remover
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                                                        <i class="ki-duotone ki-plus fs-3"></i>
                                                        Adicionar atributo
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap5-autocomplete@1.1.39/autocomplete.min.js"></script>
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