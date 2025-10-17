@extends('layouts.admin')
@section('title', 'Especificações')

@section('css')
<link href="{{ mixAssets('assets/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/raty.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="card">
            <div class="card-header mt-5">
                <div class="card-title flex-column">
                    <div class="fs-6 text-gray-800 mb-2">Selecione a sua máquina</div>
                </div>
                <div class="d-flex gap-5 btnsAside">
                    <button class="btn btn-primary openSide">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <a href="{{route('Especificacoes.criar_etapa1')}}" class="btn btn-danger">
                        <i class="bi bi-filter"></i> Limpar filtro
                    </a>
                </div>
                @component('components.filtros', [
                'url' => route('Especificacoes.criar_etapa1'),
                'telefone' => isset($telefone) ? $telefone : null,
                'nome' => isset($nome) ? $nome : null,
                'codigo_focco' => isset($codigo_focco) ? $codigo_focco : null,
                'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                'maquinas' => isset($maquinasF) ? $maquinasF : null,
                'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                'equipamento_id' => isset($equipamento_idF) ? $equipamento_idF : null,
                'clientes' => null,
                ])
                @endcomponent
            </div>
            <div class="card-body adjustCardBody pt-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body pt-3 pb-4">
                                <div class="table-responsive">
                                    @if(count($maquinas) > 0)
                                    <table class="table">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 w-0px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 w-150px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($maquinas as $item)
                                            <tr data-key="{{$item->id}}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="{{route('Especificacoes.criar_etapa2', ['slug' => $item->slug])}}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{!! $item->id !!}</a>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold text-gray-400 d-block">id</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if(optional($item->maquinasIdiomas->first())->nome)
                                                        {!! optional($item->maquinasIdiomas->first())->nome !!}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                </td>
                                                <td class="text-end">
                                                    <div style="min-width: 180px">
                                                        <a href="{{route('Especificacoes.criar_etapa2', ['slug' => $item->slug])}}" class="btn btn-sm btn btn-primary mw-100"><i class="bi bi-clipboard-data-fill"></i> Criar especificação
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Nenhuma máquina foi encontrada!</p>
                                    @endif
                                    <div class="contentPaginate mt-5 mb-5" style="margin: 0px;">
                                        {{ $maquinas->links('vendor.pagination.custom') }}
                                    </div>
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
<script>
</script>
@endsection