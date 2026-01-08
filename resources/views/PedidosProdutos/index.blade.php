@extends('layouts.admin')
@section('title', 'Especificações de produtos')

@section('css')
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                        <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                            <h6 class="text-medium">Especificações de produtos</h6>
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
                                            <a href="{{route('PedidosProdutos.index')}}" class="text-danger">
                                                <i class="bi bi-filter"></i> Limpar filtro
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @component('components.filtros', [
                        'url' => route('PedidosProdutos.index'),
                        'nome' => isset($nome) ? $nome : null,
                        'telefone' => isset($telefone) ? $telefone : null,
                        'codigo_focco' => isset($codigo_focco) ? $codigo_focco : null,
                        'serie' => isset($serie) ? $serie : null,
                        'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                        'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                        'cliente_nome' => isset($cliente_nome) ? $cliente_nome : null,
                        'maquinas' => isset($maquinasf) ? $maquinasf : null,
                        'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                        'equipamento_id' => isset($equipamento_id) ? $equipamento_id : null,
                        'clientes' => isset($clientes) ? $clientes : null,
                        'status' => isset($status) ? $status : null,
                        ])
                        @endcomponent
                    </div>
                    <div class="table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Produto</h6>
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
                                @if(count($produtos) > 0)
                                @foreach($produtos as $item)
                                @if($item['produto_nome'])
                                <tr data-href="{{route('PedidosProdutos.editar', ['id' => $item['id']])}}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $item['id'] !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span
                                                class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $item['produto_nome'] !!}
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
                                                data-bs-title="{{ $item['cliente_nome'] }}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 250px">
                                                    @if($item['cliente_nome'])
                                                        {!! $item['cliente_nome'] !!}
                                                        @else
                                                        -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item['id']}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item['id']}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('PedidosProdutos.editar', ['id' => $item['id']])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('PedidosProdutos.excluir', ['id' => $item['id']])}}" method="post">
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
                                @endif
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
                            {{ $produtos->links('vendor.pagination.custom') }}
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
<script src="{{ mixAssets('assets/js/momentjs.js') }}"></script>
@endsection