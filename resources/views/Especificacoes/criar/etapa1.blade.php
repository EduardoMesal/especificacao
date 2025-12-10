@extends('layouts.admin')
@section('title', 'Especificações')

@section('css')
<link href="{{ mixAssets('assets/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/raty.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
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
                                                <a href="{{route('Caracteristicas.index')}}" class="text-danger">
                                                    <i class="bi bi-filter"></i> Limpar filtro
                                                </a>
                                            </li>
                                        </ul>
                                    
                                    </div>
                                </div>
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
                            'status' => isset($status) ? $status : null,
                            ])
                            @endcomponent
                            <div class="table-responsive">
                                @if(count($maquinas) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="th-info">
                                                <h6>Id</h6>
                                            </th>
                                            <th class="th-info">
                                                <h6>Nome</h6>
                                            </th>
                                            <th class="th-info text-end">
                                                <h6></h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maquinas as $item)
                                        <tr data-key="{{$item->id}}">
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
                                                <span class="text-gray-800 d-block mb-1 fs-6">
                                                    @if(optional($item->maquinasIdiomas->first())->nome)
                                                    {!! optional($item->maquinasIdiomas->first())->nome !!}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
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
                                <div class="contentPaginate" style="margin: 0px;">
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
@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>
<script>
</script>
@endsection