@extends('layouts.admin')
@section('title', 'Editar atributo')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Amostras.editar_atributo_action', ['id' => $atributo->id, 'lang' => request('lang')])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex align-items-center justify-content-between mb-5">
                                            <div class="text-center">
                                                <h2 class="">Editar atributo</h2>
                                            </div>
                                            <div class="pull-right">
                                                <div class="btn-group dropleft position-relative">
                                                    <a href="javascript:void(0);" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <img src="{{ asset('/assets/img/flags/' . $idioma->icone) }}" style="width: 22px;">&nbsp;&nbsp;{!! $idioma->nome !!}
                                                    </a>

                                                    <ul class="dropdown-menu position-absolute top-100">
                                                        @foreach ($idiomas as $key => $value)
                                                            <li class="navi-item p-2">
                                                                <a href="{{ request()->fullUrlWithQuery(['lang' => $value->codigo]) }}" class="navi-link">
                                                                    <img src="{{ asset('/assets/img/flags/' . $value->icone) }}" class="img-thumbnail" style="max-width: 30px;">&nbsp;{!! $value->nome !!}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <input type="hidden" value="{{ $atributo->tipo }}" name="type" id="tipoHidden" />
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" value="{{optional($atributo->atributosAmostrasIdiomas->first())->nome}}" list="list-input" id="input-datalist" class="bg-transparent" placeholder="Preencha o campo nome" name="nome" />
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
                                                <select class="form-select form-select-solid tipo" id="select2Multiple" data-control="select2" data-hide-search="true" data-placeholder="Tipo" name="tipo">
                                                    <option @if ($atributo->tipo == 'selecionavel') ? selected : '' @endif value="selecionavel">Selecionável</option>
                                                    <option @if ($atributo->tipo == 'multiplos') ? selected : '' @endif value="multiplos">Múltiplos</option>
                                                    <option @if ($atributo->tipo == 'texto') ? selected : '' @endif value="texto">Texto</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Unidade</span>
                                                </label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Unidade" name="unidade">
                                                    <option value=""></option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'kg') selected @endif value="kg">kg</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'Hz') selected @endif value="Hz">Hz</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'mm') selected @endif value="mm">mm</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'f/h') selected @endif value="f/h">f/h</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'ml') selected @endif value="ml">ml</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'g') selected @endif value="g">g</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'V') selected @endif value="V">V</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'vol./min') selected @endif value="vol./min">vol./min</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'un/min') selected @endif value="un/min">un/min</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'm²') selected @endif value="m²">m²</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'm³') selected @endif value="m³">m³</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == '°c') selected @endif value="°c">°c</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'un/h') selected @endif value="un/h">un/h</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'un') selected @endif value="un">un</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'p/h') selected @endif value="p/h">p/h</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'l/h') selected @endif value="l/h">l/h</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == '%') selected @endif value="%">%</option>
                                                        <option @if(optional($atributo->atributosAmostrasIdiomas->first())->unidade == 'gCO2/l') selected @endif value="gCO2/l">gCO2/l</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 fv-row obsTexto mb-8 input-style-1" style="{{ $atributo->tipo != 'texto' ? 'display:none' : '' }}">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Observação</span>
                                            </label>
                                            <input type="text" value="{{optional($atributo->subAtributos->first()->subAtributosAmostrasIdiomas->first())->observacao}}" class="bg-transparent" placeholder="Preencha o campo observação" name="observacao" />
                                        </div>
                                        
                                        <div id="att" style="{{ $atributo->tipo == 'texto' ? 'display:none' : '' }}">
                                            <div class="form-group">
                                                <div data-repeater-list="att">
                                                    <input type="hidden" name="att_ids_originais" value="{{ $atributo->subAtributos->pluck('id')->implode(',') }}">
                                                    @if(count($atributo->subAtributos) > 0)
                                                        @foreach ($atributo->subAtributos as $att)
                                                            <div data-repeater-item>
                                                                <input name="att_id" type="hidden" value="{{ $att->id }}" />
                                                                <div class="form-group row input-style-1">
                                                                    <div class="col-md-6 mb-md-0">
                                                                        <label class="form-label required">Atributo</label>
                                                                        <input name="att[{{ $loop->index }}][atributo]" class="bg-transparent" type="text" placeholder="Atributo" value="{{ $atributo->tipo != 'texto' ? optional($att->subAtributosAmostrasIdiomas->first())->nome : '' }}" />
                                                                    </div>
                                                                    <div class="col-md-6 mt-md-0 mt-4">
                                                                        <label class="form-label">Observação</label>
                                                                        <input name="att[{{ $loop->index }}][observacao]" class="bg-transparent" type="text" placeholder="Observação" value="{{ $atributo->tipo != 'texto' ? optional($att->subAtributosAmostrasIdiomas->first())->observacao : '' }}" />
                                                                    </div>
                                                                    <div>
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 btn-remove">
                                                                            <i class="ki-duotone ki-trash fs-3"></i>
                                                                            Remover
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="javascript:avoid;" data-repeater-create class="btn btn-flex btn-light-primary">
                                                    <i class="ki-duotone ki-plus fs-3"></i>
                                                    Adicionar atributo
                                                </a>
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
    $(".tipo").on("change", function () {
        let valor = $(this).val();
        let attDiv = $("#att");
        let obsTexto = $(".obsTexto");

        $("#tipoHidden").val(valor);

        if (valor === "texto") {
            obsTexto.val('');
            obsTexto.show();
            attDiv.hide();
        } else {
            attDiv.show(); 
            obsTexto.hide();
        }
    });
});


</script>
@endsection