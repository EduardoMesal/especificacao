@extends('layouts.admin')
@section('title', 'Especificações de amostras')

@section('css')
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="table-responsive">
                        <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                            <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                                <h6 class="text-medium">Amostras</h6>
                                <div style="height: 19px; margin-right: 5px; position: relative">
                                    <button class="p-0 dropdown-modal" id="modalOpenFilter">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                    <div class="hidden modal-options-menu" data-modal="modalOpenFilter">
                                        <ul class="modal-options">
                                            <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                <i class="bi bi-filter"></i> Filtrar
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{route('Caracteristicas.index')}}" class="text-danger">
                                                    <i class="bi bi-filter"></i> Limpar filtro
                                                </a>
                                            </li>
                                        </ul>
                                    
                                    </div>
                                </div>
                            </div>
                            @component('components.filtros', [
                            'url' => route('Amostras.index'),
                            'telefone' => isset($telefone) ? $telefone : null,
                            'nome' => isset($nome) ? $nome : null,
                            'codigo' => isset($codigo) ? $codigo : null,
                            'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                            'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                            'maquinas' => isset($maquinas) ? $maquinas : null,
                            'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                            'equipamento_id' => isset($equipamento_id) ? $equipamento_id : null,
                            'clientes' => null,
                            ])
                            @endcomponent
                        </div>
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Nome</h6>
                                    </th>
                                    <th class="th-info text-end">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($amostras) > 0)
                                @foreach($amostras as $item)
                                <tr data-href="{{route('PedidosAmostras.criar', ['id' => $item->id])}}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $item->id !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $item->amostrasIdiomas[0]->nome !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div style="min-width: 180px">
                                            <a href="{{route('PedidosAmostras.criar', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary mw-100"><i class="bi bi-plus"></i> Criar especificação
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>
                                        <span class="text-gray-800 d-block mb-1 fs-6">Nenhum resultado encontrado!</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="contentPaginate">
                            {{ $amostras->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script src="{{ mixAssets('assets/js/jqueryui.js') }}"></script>
<script src="{{ mixAssets('assets/js/apexcharts.js') }}"></script>
<script src="{{ mixAssets('assets/js/momentjs.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
</script>
@endsection