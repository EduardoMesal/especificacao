@extends('layouts.admin')
@section('title', 'Pedidos')

@section('css')
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                        <h6 class="text-medium">Pedidos</h6>
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
                                        <a href="{{route('Pedidos.index')}}" class="text-danger">
                                            <i class="bi bi-filter"></i> Limpar filtro
                                        </a>
                                    </li>
                                </ul>
                              
                            </div>
                        </div>
                    </div>
                    @component('components.filtros', [
                    'url' => route('Pedidos.index'),
                    'telefone' => isset($telefone) ? $telefone : null,
                    'nome' => isset($nome) ? $nome : null,
                    'codigo' => isset($codigo) ? $codigo : null,
                    'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                    'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                    'maquinas' => isset($maquinasFilter) ? $maquinasFilter : null,
                    'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                    'equipamento_id' => isset($equipamento_id) ? $equipamento_id : null,
                    'clientes' => isset($clientes) ? $clientes : null,
                    ])
                    @endcomponent
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Nome</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Cliente</h6>
                                    </th>
                                    <th class="th-info text-end">
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pedidos) > 0)
                                @foreach($pedidos as $item)
                                <tr data-href="{{route('Pedidos.editar', ['id' => $item->id])}}">
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
                                                <span 
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="{!! $item->nome !!}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    {!! $item->nome !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span 
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="{!! $item->cliente->nome !!}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    {!! $item->cliente->nome !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div style="position: relative">
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('Pedidos.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('Pedidos.excluir', ['id' => $item->id])}}" method="post">
                                                            @csrf
                                                            <button class="deleteBt text-danger" type="submit">
                                                               <i class="bi bi-trash"></i> Excluir
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
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
                            {{ $pedidos->links('vendor.pagination.custom') }}
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