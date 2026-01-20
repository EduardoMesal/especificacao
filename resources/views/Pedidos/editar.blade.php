@extends('layouts.admin')
@section('title', 'Editar pedido')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Pedidos.editar_action', ['id' => $pedido->id])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center">
                                            <h2 class="">Editar pedido</h2>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">N° pedido</span>
                                                </label>
                                                <input type="number" value="{{$pedido->nome}}" class="form-control form-control-solid" placeholder="Preencha o campo número do pedido" name="nome" />
                                            </div>
                                            <div class="col-md-6 fv-row selectArea input-style-1">
                                                <label class="fs-6 fw-bold mb-2">Cliente</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar cliente" name="cliente_id">
                                                    @foreach($clientes as $item)
                                                        <option value="{{ $item->id }}" @if($pedido->cliente_id == $item->id) selected @endif>
                                                            {!! $item->nome !!}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                                <span class="indicator-label">Atualizar</span>
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
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="table-wrapper table-responsive">
                        <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                            <div class="card-title flex-column">
                                <div class="fs-6 text-gray-800 mb-2">Especificações relacionadas</div>
                            </div>
                        </div>
                        <table class="table">
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
                                        <h6>Serie</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Máquina</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Cliente</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Criador</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Criado em</h6>
                                    </th>
                                    <th class="th-info text-end">
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pedido->especificacoes) > 0)
                                @foreach($pedido->especificacoes as $item)
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
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if($item->serie)
                                                        {!! $item->serie !!}
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
                                                data-bs-title="{{ optional($item->maquina->maquinasIdiomas->first())->nome }}"
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto"  style="width: 150px">
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
                                                class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto"  style="width: 150px">
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
                                                {{ $item->usuario->nome }}
                                                </span>
                                            </div>
                                        </div>
                                        <span class="d-block"></span>
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
                                    <td class="text-end">
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
                                @else
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="table-responsive">
                        <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                            <div class="card-title flex-column">
                                <div class="fs-6 text-gray-800 mb-2">Especificações de amostras</div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Amostra</h6>
                                    </th>
                                    <th class="text-end">
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pedido->amostras) > 0)
                                @foreach($pedido->amostras as $item)
                                <tr data-href="{{route('PedidosAmostras.editar', ['id' => $item->id])}}">
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
                                                    @if($item->amostra)
                                                        {{ optional($item->amostra->amostrasIdiomas->first())->nome }}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-end">
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoesAmostras{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoesAmostras{{$item->id}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('PedidosAmostras.copiar', ['id' => $item->id])}}">  <i class="bi bi-copy"></i> Copiar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('PedidosAmostras.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('PedidosAmostras.excluir', ['id' => $item->id])}}" method="post">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="table-responsive">
                        <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                            <div class="card-title flex-column">
                                <div class="fs-6 text-gray-800 mb-2">Especificações de produtos</div>
                            </div>
                        </div>
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Produto</h6>
                                    </th>
                                    <th class="text-end">
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pedido->produtos) > 0)
                                @foreach($pedido->produtos as $item)
                                <tr data-href="{{route('PedidosProdutos.editar', ['id' => $item->id])}}">
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
                                                    @if($item->produto)
                                                        {{ optional($item->produto->produtosIdiomas->first())->nome }}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoesProdutos{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoesProdutos{{$item->id}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('PedidosProdutos.copiar', ['id' => $item->id])}}">  <i class="bi bi-copy"></i> Copiar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('PedidosProdutos.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('PedidosProdutos.excluir', ['id' => $item->id])}}" method="post">
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
<script>
    $(document).ready(function() {
    });
</script>
@endsection