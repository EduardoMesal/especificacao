@extends('layouts.admin')
@section('title', 'Seções')

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
                                <h6 class="text-medium">Seções</h6>
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
                                                <a href="{{route('Secoes.index')}}" class="text-danger">
                                                    <i class="bi bi-filter"></i> Limpar filtro
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @component('components.filtros', [
                            'url' => route('Secoes.index'),
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
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="contentSortableSecoes">
                                @if(count($secoes) > 0)
                                @foreach($secoes as $item)
                                <tr data-key="{{$item->id}}" class="draggableTr" data-ordem="{{ $item->id }}" data-href="{{route('Secoes.editar', ['id' => $item->id])}}">
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
                                                    {!! $item->secoesIdiomas[0]->nome !!}
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
                                                        <a class="link-modal" href="{{route('Secoes.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('Secoes.excluir', ['id' => $item->id])}}" method="post">
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
                        @if($secoes->hasPages())
                        <div class="contentPaginate mt-5 mb-5">
                            {{ $secoes->links('vendor.pagination.custom') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
   $('#contentSortableSecoes').sortable({
        axis: 'y',
        items: '> .draggableTr',
        helper: function (e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();

            $helper.children().each(function (index) {
                $(this).width($originals.eq(index).width());
            });

            return $helper;
        },
        start: function (e, ui) {
            ui.helper.css('background', '#f5f8fa');
        },
        stop: function(event, ui) {
            var order = $(this).sortable('toArray', {
                attribute: 'data-key'
            });

            $.ajax({
                url: '/secoes/ordem',
                method: 'POST',
                data: {
                    order: order,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Ordens das seções atualizadas com sucesso!');
                    }
                },
                error: function() {
                    console.log('Ocorreu um erro ao atualizar a ordem das seções.');
                }
            });
        }
    }).disableSelection();

</script>
@endsection