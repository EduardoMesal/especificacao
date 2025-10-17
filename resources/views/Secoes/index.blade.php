@extends('layouts.admin')
@section('title', 'Seções')

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
                    <div class="fs-6 text-gray-800 mb-2">Seções</div>
                </div>
                <div class="d-flex gap-5 btnsAside">
                    <button class="btn btn-primary openSide">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <a href="{{route('Secoes.index')}}" class="btn btn-danger">
                        <i class="bi bi-filter"></i> Limpar filtro
                    </a>
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
            <div class="card-body adjustCardBody pt-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body pt-3 pb-4">
                                <div class="table-responsive">
                                    @if(count($secoes) > 0)
                                    <table class="table">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 w-0px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 w-100px"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="contentSortableSecoes">
                                            @foreach($secoes as $item)
                                            <tr data-key="{{$item->id}}" class="draggableTr" data-ordem="{{ $item->id }}">
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
                                                            <a href="{{route('Secoes.editar', ['id' => $item->id])}}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{!! $item->secoesIdiomas[0]->nome !!}</a>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="adjustBtnsUser gap-5">
                                                        <a href="{{route('Secoes.editar', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar
                                                        </a>
                                                        <form class="responseAjax" action="{{route('Secoes.excluir', ['id' => $item->id])}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                                <i class="bi bi-trash-fill"></i>Excluir
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Nenhum usuário foi encontrado!</p>
                                    @endif
                                    <div class="contentPaginate mt-5 mb-5" style="margin: 0px;">
                                        {{ $secoes->links('vendor.pagination.custom') }}
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