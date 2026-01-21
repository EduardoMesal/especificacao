@extends('layouts.admin')
@section('title', 'Adicionar amostra')

@section('css')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

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
                                    <form class="form responseAjax" method="POST" action="{{route('PedidosAmostras.criar_action', ['id' => $amostra->id])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="amostraIndicePedidoId" value="">
                                        <div class="d-flex justify-content-between align-items-center mb-8">
                                            <div class="d-flex justify-content-center gap-2 align-items-center">
                                                <h2 style="margin:0px;" class="">{!! optional($amostra->amostrasIdiomas->first())->nome !!}</h2>
                                                <div class="">
                                                    @if(optional($amostra->amostrasIdiomas->first())->aviso)
                                                    <p style="margin-bottom: 0px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAviso--{{$amostra->id}}">
                                                        <i class="bi bi-info-square-fill"></i>
                                                    </p>
                                                    <div class="modal fade" id="modalAviso--{{$amostra->id}}" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title align-self-center" id="modalAviso--{{$amostra->id}}">Aviso</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body modal-imagem-aviso">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-xl-12">
                                                                            {!! preg_replace('/src=["\'](?:\.\.\/)+assets\/files\//', 'src="'.url('/assets/files/').'/', optional($amostra->amostrasIdiomas->first())->aviso) !!}
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
                                            </div>
                                        </div>
                                        <div class="row g-9 mt-5 mb-8">
                                            <div class="col-md-12 selectArea input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Pedido</span>
                                                </label>
                                                <select class="form-select form-select-solid"
                                                    data-control="select2"
                                                    data-hide-search="true"
                                                    data-placeholder="Selecionar pedido"
                                                    name="pedido_id">
                                                    <option></option>
                                                    @foreach($pedidos as $p)
                                                        <option value="{{ $p['id'] }}">
                                                            N° {{$p['nome']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @foreach($amostra->atributos as $key => $a)
                                                <input type="hidden" name="amostrasAtributo[{{ $key }}][atributo_id]" value="{{ $a->id }}">
                                                @if($a->tipo == 'multiplos')
                                                    <div class="col-md-12 clearfix">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>{{ optional($a->atributosAmostrasIdiomas->first())->nome }} @if( optional($a->atributosAmostrasIdiomas->first())->unidade) | {!! optional($a->atributosAmostrasIdiomas->first())->unidade !!} @endif</span>
                                                        </label>
                                                    </div>
                                                    @foreach($a->subAtributos as $sub)
                                                        <div class="col-md-6 input-style-1">
                                                            <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                                <div class="d-flex gap-5 align-items-center">
                                                                    <span>{!! optional($sub->subAtributosAmostrasIdiomas->first())->nome !!}</span>
                                                                </div>
                                                            </label>

                                                            <input type="hidden" name="amostrasAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][subatributo_id]" value="{{ $sub->id }}" />
                                                            <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo valor" name="amostrasAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][conteudo]" />
                                                            @if(optional($sub->subAtributosAmostrasIdiomas->first())->observacao)
                                                            <div class="observacao mt-2 alert alert-warning mb-0">
                                                                <label class="d-flex align-items-center fs-6 fw-bold">
                                                                    <span class="">Observação</span>
                                                                </label>
                                                                <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                                    {{ optional($sub->subAtributosAmostrasIdiomas->first())->observacao }}
                                                                </p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 input-style-1">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span>Observações</span>
                                                            </label>
                                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="amostrasAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][observacao_personalizada]" />
                                                        </div>
                                                    @endforeach

                                                @elseif($a->tipo == 'texto')
                                                    <div class="col-md-6 input-style-1">
                                                        <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                            <div class="d-flex gap-5 align-items-center">
                                                                <span>{!! optional($a->atributosAmostrasIdiomas->first())->nome !!} @if(optional($a->atributosAmostrasIdiomas->first())->unidade) | {!! optional($a->atributosAmostrasIdiomas->first())->unidade !!} @endif</span>
                                                            </div>
                                                            <!-- <div class="form-check form-switch">
                                                                <input type="hidden" name="amostrasAtributo[{{ $key }}][resumo]" value="0">
                                                                <input class="form-check-input" type="checkbox" name="amostrasAtributo[{{ $key }}][resumo]" value="1">
                                                            </div> -->
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo texto" name="amostrasAtributo[{{ $key }}][conteudo]" />
                                                        @if(optional($a->subAtributos->first()->subAtributosAmostrasIdiomas->first())->observacao)
                                                        <div class="observacao mt-2 alert alert-warning mb-0">
                                                            <label class="d-flex align-items-center fs-6 fw-bold">
                                                                <span class="">Observação</span>
                                                            </label>
                                                            <p class="observacaoDefault italic" style="margin-bottom:0px;">
                                                                {{ optional($a->subAtributos->first()->subAtributosAmostrasIdiomas->first())->observacao }}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 input-style-1">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Observações</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="amostrasAtributo[{{ $key }}][observacao_personalizada]" />
                                                    </div>
                                                @elseif($a->tipo == 'selecionavel')
                                                    <div class="col-md-6 selectArea input-style-1">
                                                        <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                            <div class="d-flex gap-5 align-items-center">
                                                                <span>{!! optional($a->atributosAmostrasIdiomas->first())->nome !!} @if(optional($a->atributosAmostrasIdiomas->first())->unidade) | {!! optional($a->atributosAmostrasIdiomas->first())->unidade !!} @endif</span>
                                                            </div>
                                                        </label>
                                                        <select class="form-select form-select-solid selectAtributo"
                                                            data-control="select2"
                                                            data-hide-search="true"
                                                            data-placeholder="Selecionar atributo"
                                                            name="amostrasAtributo[{{ $key }}][atributo_selecionavel][subatributo_id]">
                                                            <option></option>
                                                            @if(count($a->subAtributos) == 0)
                                                                <option selected value="0">Atributo não especificado</option>
                                                            @else
                                                                @foreach($a->subAtributos as $subA)
                                                                    <option value="{{ $subA->id }}" data-observacao="{{ optional($subA->subAtributosAmostrasIdiomas->first())->observacao }}">
                                                                        {!! optional($subA->subAtributosAmostrasIdiomas->first())->nome !!}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="observacao mt-2 alert alert-warning mb-0" style="display: none;">
                                                            <label class="d-flex align-items-center fs-6 fw-bold">
                                                                <span class="">Observação</span>
                                                            </label>
                                                            <p class="observacaoText" style="margin-bottom:0px;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 input-style-1">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Observações</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="amostrasAtributo[{{ $key }}][observacao_personalizada]" />
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="col-md-12 imgArea">
                                                <input type="file" class="filepond" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" name="imagens[]" multiple>
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
</div>
@endsection
@section('plugins')
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="{{ mixAssets('/assets/js/closeSave.js') }}"></script>

<script>
    $(document).ready(function() {
        
    });
</script>
@endsection