@extends('layouts.admin')
@section('title', 'Criar especificação')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Especificacoes.criar_action', ['id' => $maquina->id])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center">
                                            <h2 class="">Crie sua especificação</h2>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Máquina</span>
                                                </label>
                                                <input type="text" disabled class="bg-transparent" value="{{ optional($maquina->maquinasIdiomas->first())->nome }}"/>
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Pedido</span>
                                                </label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar pedido" name="pedido_id">
                                                    <option></option>
                                                    @foreach($pedidos as $item)
                                                        <option value="{{$item->id}}">{!! $item->id !!} - {!! $item->nome !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Código Focco</span>
                                                </label>
                                                <input type="text" name="codigo_focco" class="bg-transparent" value=""/>
                                            </div>
                                            <div class="col-md-6 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Série</span>
                                                </label>
                                                <input type="text" name="serie" class="bg-transparent" value=""/>
                                            </div>
                                            <!-- <div class="col-md-12 fv-row selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Status</span>
                                                </label>
                                                <select class="form-select form-select-solid" id="select2Multiple" data-control="select2" data-hide-search="true" data-placeholder="Selecionar status" name="status">
                                                    <option></option>
                                                    <option value="Comercial">Comercial</option>
                                                    <option value="Engenharia de venda">Engenharia de venda</option>
                                                    <option value="Engenharia de aplicação">Engenharia de aplicação</option>
                                                    <option></option>
                                                </select>
                                            </div> -->
                                            <div class="col-md-12 fv-row">
                                                @foreach($maquina->caracteristicas as $index => $c)
                                                    <div class="mb-8 fv-row row selectArea input-style-1">
                                                        @if($c->tipo == 'selecionavel')
                                                            <div class="col-md-6">
                                                                <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <span class="">{!! optional($c->caracteristicasIdiomas->first())->nome !!}</span> 
                                                                        @if(optional($c->caracteristicasIdiomas->first())->unidade)
                                                                        <span class="">| {!! optional($c->caracteristicasIdiomas->first())->unidade !!}</span> 
                                                                        @endif
                                                                        @if(optional($c->caracteristicasIdiomas->first())->aviso)
                                                                        <p style="margin-bottom: 0px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAviso--{{$c->id}}">
                                                                            <i class="bi bi-info-square-fill"></i>
                                                                        </p>
                                                                        <div class="modal fade" id="modalAviso--{{$c->id}}" role="dialog">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title align-self-center" id="modalAviso--{{$c->id}}">Aviso</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-xl-12">
                                                                                                {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($c->caracteristicasIdiomas->first())->aviso) !!}
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
                                                                </label>
                                                                <select class="form-select form-select-solid selectAtributo"
                                                                    data-id="{{ $c->id }}"
                                                                    data-control="select2"
                                                                    data-hide-search="true"
                                                                    data-placeholder="Selecionar atributo"
                                                                    name="caracteristicas[{{ $c->id }}][atributo_id]">
                                                                    <option></option>
                                                                    @if(count($c->atributos) == 0)
                                                                        <option selected value=""></option>
                                                                    @else
                                                                        @foreach($c->atributos as $a)
                                                                            <option value="{{ $a->id }}" data-observacao="{{ optional($a->atributosIdiomas->first())->observacao }}">
                                                                                {!! optional($a->atributosIdiomas->first())->nome !!}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                <div class="observacao mt-2 alert alert-warning" style="display: none;">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold">
                                                                        <span class="">Observação</span>
                                                                    </label>
                                                                    <p class="observacaoText" style="margin-bottom:0px;"></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-3 mb-0 mt-md-0 input-style-1">
                                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                    <span class="">Observações</span>
                                                                </label>
                                                                <input type="text" class="bg-transparent"
                                                                    name="caracteristicas[{{ $c->id }}][observacao_personalizada]" />
                                                                <input type="hidden" name="caracteristicas[{{ $c->id }}][caracteristica_id]" value="{{ $c->id }}" />
                                                            </div>
                                                        @elseif ($c->tipo == 'multiplos')
                                                            <label class="d-flex fs-6 fw-bold d-flex justify-content-between">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <span class="">{!! optional($c->caracteristicasIdiomas->first())->nome !!}</span> 
                                                                    @if(optional($c->caracteristicasIdiomas->first())->unidade)
                                                                    <span class="">| {!! optional($c->caracteristicasIdiomas->first())->unidade !!}</span> 
                                                                    @endif
                                                                    @if(optional($c->caracteristicasIdiomas->first())->aviso)
                                                                    <p style="margin-bottom: 0px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAviso--{{$c->id}}">
                                                                        <i class="bi bi-info-square-fill"></i>
                                                                    </p>
                                                                    <div class="modal fade" id="modalAviso--{{$c->id}}" role="dialog">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title align-self-center" id="modalAviso--{{$c->id}}">Aviso</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xl-12">
                                                                                            {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($c->caracteristicasIdiomas->first())->aviso) !!}
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
                                                            </label>
                                                            @foreach($c->atributos as $a)
                                                                <div class="container adjustment-row-multiplos">
                                                                    <div class="row">
                                                                        <div class="col-md-6 adjustment-input-style">
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="">{{ optional($a->atributosIdiomas->first())->nome }}</span>
                                                                            </label>

                                                                            <input type="hidden" name="caracteristicas[{{ $c->id }}][atributo_multiplo][{{ $loop->index }}][atributo_id]" value="{{ $a->id }}" />

                                                                            <input type="text" class="bg-transparent textAtributo" placeholder="Preencha o campo atributo" 
                                                                                name="caracteristicas[{{ $c->id }}][atributo_multiplo][{{ $loop->index }}][conteudo]" />

                                                                            @if(optional($a->atributosIdiomas->first())->observacao)
                                                                                <div class="observacao mt-2 alert alert-warning mb-0">
                                                                                    <label class="d-flex align-items-center fs-6 fw-bold">
                                                                                        <span class="">Observação</span>
                                                                                    </label>
                                                                                    <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                                                        {{ optional($a->atributosIdiomas->first())->observacao }}
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-6 mt-3 mb-0 mt-md-0 input-style-1">
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="">Observações</span>
                                                                            </label>
                                                                            <input type="text" class="bg-transparent"
                                                                            name="caracteristicas[{{ $c->id }}][atributo_multiplo][{{ $loop->index }}][observacao_personalizada]" />
                                                                            <input type="hidden" name="caracteristicas[{{ $c->id }}][caracteristica_id]" value="{{ $c->id }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                        <div class="col-md-6">
                                                            <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <span class="">{!! optional($c->caracteristicasIdiomas->first())->nome !!}</span> 
                                                                    @if(optional($c->caracteristicasIdiomas->first())->unidade)
                                                                    <span class="">| {!! optional($c->caracteristicasIdiomas->first())->unidade !!}</span> 
                                                                    @endif
                                                                    @if(optional($c->caracteristicasIdiomas->first())->aviso)
                                                                    <p style="margin-bottom: 0px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAviso--{{$c->id}}">
                                                                        <i class="bi bi-info-square-fill"></i>
                                                                    </p>
                                                                    <div class="modal fade modalHeight" id="modalAviso--{{$c->id}}" role="dialog">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title align-self-center" id="modalAviso--{{$c->id}}">Aviso</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xl-12">
                                                                                            {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($c->caracteristicasIdiomas->first())->aviso) !!}
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
                                                            </label>
                                                            <input type="hidden" name="caracteristicas[{{ $c->id }}][atributo_texto][atributo_id]" value="{{ $c->atributos[0]->id }}" />
                                                            <input type="text" class="bg-transparent textAtributo" placeholder="Preencha o campo texto" name="caracteristicas[{{ $c->id }}][atributo_texto][conteudo]" />
                                                            <input type="hidden" name="caracteristicas[{{ $c->id }}][caracteristica_id]" value="{{ $c->id }}" />
                                                            
                                                            @if(optional($c->atributos->first()->atributosIdiomas->first())->observacao)
                                                                <div class="observacao mt-2 alert alert-warning mb-0">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold">
                                                                        <span class="">Observação</span>
                                                                    </label>
                                                                    <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                                        {{ optional($c->atributos->first()->atributosIdiomas->first())->observacao }}
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mt-3 mb-0 mt-md-0 input-style-1">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span class="">Observações</span>
                                                            </label>
                                                            <input type="text" class="bg-transparent"
                                                            placeholder="Observação personalizada"
                                                            name="caracteristicas[{{ $c->id }}][atributo_texto][observacao_personalizada]" />
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                <div id="att">
                                                    <div class="form-group input-style-1">
                                                        <div data-repeater-list="att">
                                                            <div data-repeater-item class="templateItem" style="display: none;">
                                                                <div class="form-group row mb-4">
                                                                    <div class="col-md-12">
                                                                        <label class="form-label">Observação</label>
                                                                        <input name="observacao" class="bg-transparent" type="text" placeholder="Observação" />
                                                                    </div>
                                                                    <div>
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 btn-remove">
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
                                                            Adicionar observação
                                                        </a>
                                                    </div>
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
<script src="{{ mixAssets('/assets/js/closeSave.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2Multiple').select2({
            minimumResultsForSearch: Infinity,
            language: 'pt-BR'
        });

    });
</script>
@endsection