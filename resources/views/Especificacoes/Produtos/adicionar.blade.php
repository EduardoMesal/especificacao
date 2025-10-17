@extends('layouts.admin')
@section('title', 'Adicionar produto')

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
                                <form class="form responseAjax" method="POST" action="{{route('Especificacoes.criar_produto_action', ['especificacaoId' => $especificacaoId, 'id' => $produto->id])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-between align-items-center mb-8">
                                        <div class="d-flex justify-content-center gap-2 align-items-center">
                                            <div>
                                                <h1 style="margin:0px;" class="">{!! optional($produto->produtosIdiomas->first())->nome !!}</h1>
                                            </div>
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
                                        <a class="btn btn-sm btn btn-primary" href="{{ route('Especificacoes.especificacao', ['id' => $especificacaoId]) }}">Voltar</a>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        @foreach($produto->atributos as $key => $a)
                                            <input type="hidden" name="produtosAtributo[{{ $key }}][atributo_produto_id]" value="{{ $a->id }}">
                                            @if($a->tipo == 'multiplos')
                                                <div class="col-md-12 clearfix">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span>{{ optional($a->atributosProdutosIdiomas->first())->nome }} @if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                    </label>
                                                </div>
                                                @foreach($a->subAtributos as $sub)
                                                    <div class="col-md-6 fv-row">
                                                        <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                            <div class="d-flex gap-5 align-items-center">
                                                                <span>{!! optional($sub->subAtributosProdutosIdiomas->first())->nome !!}</span>
                                                            </div>
                                                        </label>

                                                        <input type="hidden" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][subatributo_id]" value="{{ $sub->id }}" />
                                                        <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo valor" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][conteudo]" />
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
                                                        <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][atributo_multiplo][{{ $loop->index }}][observacao_personalizada]" />
                                                    </div>
                                                @endforeach

                                            @elseif($a->tipo == 'texto')
                                                <div class="col-md-6 fv-row">
                                                    <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                        <div class="d-flex gap-5 align-items-center">
                                                            <span>{!! optional($a->atributosProdutosIdiomas->first())->nome !!} @if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                        </div>
                                                        <!-- <div class="form-check form-switch">
                                                            <input type="hidden" name="produtosAtributo[{{ $key }}][resumo]" value="0">
                                                            <input class="form-check-input" type="checkbox" name="produtosAtributo[{{ $key }}][resumo]" value="1">
                                                        </div> -->
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid textAtributo" placeholder="Preencha o campo texto" name="produtosAtributo[{{ $key }}][conteudo]" />
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
                                                    <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][observacao_personalizada]" />
                                                </div>
                                            @elseif($a->tipo == 'selecionavel')
                                                <div class="col-md-6 fv-row selectArea">
                                                    <label class="d-flex fs-6 fw-bold mb-2 d-flex justify-content-between">
                                                        <div class="d-flex gap-5 align-items-center">
                                                            <span>{!! optional($a->atributosProdutosIdiomas->first())->nome !!} @if(optional($a->atributosProdutosIdiomas->first())->unidade) | {!! optional($a->atributosProdutosIdiomas->first())->unidade !!} @endif</span>
                                                        </div>
                                                    </label>
                                                    <select class="form-select form-select-solid selectAtributo"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        data-placeholder="Selecionar atributo"
                                                        name="produtosAtributo[{{ $key }}][atributo_selecionavel][subatributo_id]">
                                                        <option></option>
                                                        @if(count($a->subAtributos) == 0)
                                                            <option selected value="0">Atributo não especificado</option>
                                                        @else
                                                            @foreach($a->subAtributos as $subA)
                                                                <option value="{{ $subA->id }}" data-observacao="{{ optional($subA->subAtributosProdutosIdiomas->first())->observacao }}">
                                                                    {!! optional($subA->subAtributosProdutosIdiomas->first())->nome !!}
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
                                                <div class="col-md-6 mb-0 mb-md-8 fv-row adjustSpaceObs">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span>Observações</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="Preencha a observação" name="produtosAtributo[{{ $key }}][observacao_personalizada]" />
                                                </div>
                                            @endif
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