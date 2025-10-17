@extends('layouts.admin')
@section('title', 'Editar pedido')

@section('css')
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
                                <form class="form responseAjax" method="POST" action="{{route('Pedidos.editar_action', ['id' => $pedido->id])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-10">
                                        <h2 class="">Editar pedido</h2>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" value="{{$pedido->nome}}" class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                        <div class="col-md-6 fv-row selectArea">
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
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="row gy-5 g-xl-10">
            <div class="col-xl-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-3 pb-4">
                        <div class="table-responsive">
                            <div class="card-header mt-5" style="padding: .5rem 0px; border-bottom:0px">
                                <div class="card-title flex-column">
                                    <div class="fs-6 text-gray-800 mb-2">Especificações relacionadas</div>
                                </div>
                            </div>
                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 w-0px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <!-- <th class="p-0 min-w-100px"></th> -->
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 w-100px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($pedido->especificacoes) > 0)
                                    @foreach($pedido->especificacoes as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        {!! $item->id !!}
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Id</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($item->codigo_focco)
                                                            {!! $item->codigo_focco !!}
                                                            @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Código Focco</span>
                                        </td>
                                        <!-- <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($item->status)
                                                            {!! $item->status !!}
                                                            @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Status</span>
                                        </td> -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($item->serie)
                                                            {!! $item->serie !!}
                                                            @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Série</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($item->maquina)
                                                        {{ optional($item->maquina->maquinasIdiomas->first())->nome }}
                                                            @if(optional($item->maquina->equipamento->equipamentosOrigemIdiomas->first())->nome)
                                                            - {!! optional($item->maquina->equipamento->equipamentosOrigemIdiomas->first())->nome !!} 
                                                            @endif
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Máquina</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($pedido->cliente->nome)
                                                            {!! $pedido->cliente->nome !!}
                                                            @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Cliente</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="adjustBtnsUser gap-5">
                                                <a href="{{route('Especificacoes.especificacao', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-eye-fill"></i> Visualizar
                                                </a>
                                                <a href="{{route('Especificacoes.editar', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar
                                                </a>
                                                <form class="responseAjax" action="{{route('Especificacoes.excluir', ['id' => $item->id])}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                        <i class="bi bi-trash-fill"></i>Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Nenhum resultado encontrado!</span>
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