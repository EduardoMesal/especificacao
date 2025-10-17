@extends('layouts.admin')
@section('title', 'Equipamentos')

@section('css')
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="row g-5 g-xl-10">
            <div class="col-xl-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-3 pb-4">
                        <div class="table-responsive">
                            <div class="card-header mt-5" style="padding: .5rem 0px; border-bottom:0px">
                                <div class="card-title flex-column">
                                    <div class="fs-6 text-gray-800 mb-2">Equipamentos</div>
                                </div>
                                <div class="d-flex gap-5 btnsAside">
                                    <button class="btn btn-primary openSide">
                                        <i class="bi bi-filter"></i> Filtrar
                                    </button>
                                    <a href="{{route('Equipamentos.index')}}" class="btn btn-danger">
                                        <i class="bi bi-filter"></i> Limpar filtro
                                    </a>
                                </div>
                                @component('components.filtros', [
                                'url' => route('Equipamentos.index'),
                                'telefone' => isset($telefone) ? $telefone : null,
                                'nome' => isset($nome) ? $nome : null,
                                'codigo' => isset($codigo) ? $codigo : null,
                                'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                                'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                                'maquinas' => isset($maquinas) ? $maquinas : null,
                                'equipamentos' => isset($equipamentosF) ? $equipamentosF : null,
                                'equipamento_id' => isset($equipamento_idF) ? $equipamento_idF : null,
                                'clientes' => null,
                                ])
                                @endcomponent
                            </div>
                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 w-0px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 w-100px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($equipamentos) > 0)
                                    @foreach($equipamentos as $item)
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
                                                       {!! $item->equipamentosOrigemIdiomas[0]->nome !!}
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="adjustBtnsUser gap-5">
                                                <a href="{{route('Equipamentos.editar', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar
                                                </a>
                                                <form class="responseAjax" action="{{route('Equipamentos.excluir', ['id' => $item->id])}}" method="post">
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
                            <div class="contentPaginate mt-5 mb-5">
                                {{ $equipamentos->links('vendor.pagination.custom') }}
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
<script src="{{ mixAssets('assets/js/jqueryui.js') }}"></script>
<script src="{{ mixAssets('assets/js/apexcharts.js') }}"></script>
<script src="{{ mixAssets('assets/js/momentjs.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
</script>
@endsection