@extends('layouts.admin')
@section('title', 'Copiar característica')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Caracteristicas.criar_action')}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center d-flex justify-content-between align-items-center">
                                            <h2 class="">Copiar característica</h2>
                                            <div class="form-check-right">
                                                <div class="form-check form-switch ">
                                                    <label class="form-check-label">Comparável</label>
                                                    <input type="hidden" name="comparavel" value="0">
                                                    <input class="form-check-input" type="checkbox" name="comparavel" value="1" {{ old('comparavel', $caracteristica->comparavel ?? false) ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" value="{{ optional($caracteristica->caracteristicasIdiomas->first())->nome }}" class="bg-transparent" placeholder="Preencha o campo nome" name="nome" />
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Tipo</span>
                                                </label>
                                                <select class="form-select form-select-solid tipo" data-control="select2" data-hide-search="true" data-placeholder="Selecionar tipo" name="tipo">
                                                    <option @if ($caracteristica->tipo == 'selecionavel') ? selected : '' @endif value="selecionavel">Selecionável</option>
                                                    <option @if ($caracteristica->tipo == 'multiplos') ? selected : '' @endif value="multiplos">Múltiplos</option>
                                                    <option @if ($caracteristica->tipo == 'texto') ? selected : '' @endif value="texto">Texto</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Seção</span>
                                                </label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seção" name="secao_id">
                                                    <option value=""></option>
                                                    @foreach($secoes as $item)
                                                    <option @if($caracteristica->secao_id == $item->id) selected @endif value="{{$item->id}}">
                                                        {{ optional($item->secoesIdiomas->first())->nome }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Unidade</span>
                                                </label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Unidade" name="unidade">
                                                    <option value=""></option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'kg') selected @endif value="kg">kg</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'hz') selected @endif value="hz">hz</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'mm') selected @endif value="mm">mm</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'f/h') selected @endif value="f/h">f/h</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'ml') selected @endif value="ml">ml</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'g') selected @endif value="g">g</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'v') selected @endif value="v">v</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'vol/min') selected @endif value="vol/min">vol/min</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'un/min') selected @endif value="un/min">un/min</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'm/min') selected @endif value="m/min">m/min</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'm²') selected @endif value="m²">m²</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'm³') selected @endif value="m³">m³</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == '°c') selected @endif value="°c">°c</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'unid/h') selected @endif value="unid/h">unid/h</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'p/h') selected @endif value="p/h">p/h</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'l/h') selected @endif value="l/h">l/h</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == '%') selected @endif value="%">%</option>
                                                    <option @if(optional($caracteristica->caracteristicasIdiomas->first())->unidade == 'gCO2/l') selected @endif value="gCO2/l">gCO2/l</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-8 fv-row ckEditorView">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="notRequired">Avisos</span>
                                            </label>
                                            <textarea name="aviso" id="texto-2" class="form-control ckText">
                                            {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($caracteristica->caracteristicasIdiomas->first())->aviso) !!}
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 fv-row obsTexto mb-8 input-style-1" style="{{ $caracteristica->tipo != 'texto' ? 'display:none' : '' }}">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Observação</span>
                                            </label>
                                            <input type="text" value="{{optional($caracteristica->atributos->first()->atributosIdiomas->first())->observacao}}" class="bg-transparent obsTextoInput" placeholder="Preencha o campo observação" name="observacao" />
                                        </div>
                                        <div id="att" class="pt-30" style="{{ $caracteristica->tipo == 'texto' ? 'display:none' : '' }}">
                                            <div class="form-group">
                                                <div data-repeater-list="att">
                                                    @if(count($caracteristica->atributos) > 0)
                                                    @foreach ($caracteristica->atributos as $att)
                                                    <div data-repeater-item>
                                                        <input name="att_id" type="hidden" value="{{ $att->id }}" />
                                                        <div class="form-group row input-style-1">
                                                            <div class="col-md-6 mb-md-0">
                                                                <label class="form-label required">Atributo</label>
                                                                <input name="att[{{ $loop->index }}][atributo]" class="bg-transparent" type="text" placeholder="Atributo" value="{{ $caracteristica->tipo != 'texto' ? optional($att->atributosIdiomas->first())->nome : '' }}" />
                                                            </div>
                                                            <div class="col-md-6 mt-md-0 mt-4">
                                                                <label class="form-label">Observação</label>
                                                                <input name="att[{{ $loop->index }}][observacao]" class="bg-transparent" type="text" placeholder="Observação" value="{{ $caracteristica->tipo != 'texto' ? optional($att->atributosIdiomas->first())->observacao : '' }}" />
                                                            </div>
                                                            <div class="">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 btn-remove">
                                                                    <i class="ki-duotone ki-trash fs-3"></i>
                                                                    Remover
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div id="att">
                                                        <div class="form-group">
                                                            <div data-repeater-list="att">
                                                                <div data-repeater-item>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-6 mb-md-0 input-style-1">
                                                                            <label class="form-label required">Atributo</label>
                                                                            <input name="atributo" class="bg-transparent" type="text" placeholder="Atributo" />
                                                                        </div>
                                                                        <div class="col-md-6 mt-md-0 mt-4 input-style-1">
                                                                            <label class="form-label">Observação</label>
                                                                            <input name="observacao" class="bg-transparent" type="text" placeholder="Observação" />
                                                                        </div>
                                                                        <div class="mb-5">
                                                                            <a href="javascript:avoid;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3">
                                                                                <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                Remover
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    let primeiroItem = $("#att [data-repeater-item]").first().clone();

    $(".tipo").on("change", function() {
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
</script>
@endsection