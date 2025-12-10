@extends('layouts.admin')
@section('title', 'Especificações')

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
                            <h6 class="text-medium">Especificações</h6>
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
                                            <a href="{{route('Especificacoes.index')}}" class="text-danger">
                                                <i class="bi bi-filter"></i> Limpar filtro
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                        @component('components.filtros', [
                        'url' => route('Especificacoes.index'),
                        'nome' => isset($nome) ? $nome : null,
                        'telefone' => isset($telefone) ? $telefone : null,
                        'codigo_focco' => isset($codigo_focco) ? $codigo_focco : null,
                        'serie' => isset($serie) ? $serie : null,
                        'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                        'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                        'cliente_nome' => isset($cliente_nome) ? $cliente_nome : null,
                        'maquinas' => isset($maquinas) ? $maquinas : null,
                        'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                        'equipamento_id' => isset($equipamento_id) ? $equipamento_id : null,
                        'clientes' => isset($clientes) ? $clientes : null,
                        'status' => isset($status) ? $status : null,
                        'criado' => isset($criado) ? $criado : null,
                        ])
                        @endcomponent
                    </div>
                    <div class="table-wrapper table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Código Focco</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Status</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Máquina</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Cliente</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Criado</h6>
                                    </th>
                                    <th>
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($especificacoes) > 0)
                                @foreach($especificacoes as $item)
                                @if($item->maquina)
                                <tr data-href="{{route('Especificacoes.especificacao', ['id' => $item->id])}}">
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
                                                    @if($item->codigo_focco)
                                                        {!! $item->codigo_focco !!}
                                                        @else
                                                        -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if($item->status)
                                                        {!! $item->status !!}
                                                        @else
                                                        -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-gray-400 d-block">Status</span>
                                    </td> -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if ($item->status === 'Finalizada')
                                                        <span class="badge text-bg-finalizada">Finalizada</span>

                                                    @elseif ($item->status === 'Não iniciada')
                                                        <span class="badge text-bg-danger">Não iniciada</span>

                                                    @elseif ($item->status === 'Em andamento')
                                                        <span class="badge text-bg-grey">Em andamento</span>
                                                    @else
                                                    <span class="badge text-bg-danger">Não iniciada</span>
                                                    @endif
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
                                                data-bs-title="{{ optional($item->maquina->maquinasIdiomas->first())->nome }}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    @if((optional($item->maquina->maquinasIdiomas->first())->nome))
                                                        {{ optional($item->maquina->maquinasIdiomas->first())->nome }}
                                                        @else
                                                        -
                                                    @endif
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
                                                data-bs-title="{{ $item->pedido->cliente->nome }}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    @if($item->pedido->cliente->nome)
                                                        {!! $item->pedido->cliente->nome !!}
                                                        @else
                                                        -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                {{ $item->criado->format('d/m/Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <span class="d-block"></span>
                                    </td>
                                    <td>
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                        </div>
                                        <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                            <ul class="modal-options">
                                                <li class="dropdown-item">
                                                    <a class="link-modal" href="{{route('Especificacoes.especificacao', ['id' => $item->id])}}"> <i class="bi bi-eye"></i> Visualizar
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a class="link-modal" href="{{route('Especificacoes.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <form class="responseAjax" action="{{route('Especificacoes.excluir', ['id' => $item->id])}}" method="post">
                                                        @csrf
                                                        <button class="deleteBt text-danger" type="submit">
                                                            <i class="bi bi-trash"></i> Excluir
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <span class="text-gray-800 d-block mb-1 fs-6">Nenhum resultado encontrado!</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="contentPaginate">
                            {{ $especificacoes->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
@endsection