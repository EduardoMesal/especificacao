@extends('layouts.admin')
@section('title', 'Colaboradores')

@section('css')
<link href="{{ mixAssets('assets/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/raty.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ mixAssets('assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-6 mb-xl-9">
            <div class="card-header mt-5">
                <div class="card-title flex-column">
                </div>
                <div class="d-flex gap-5 btnsAside">
                    <button class="btn btn-primary openSide">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <a href="{{route('AdminColaboradores.index')}}" class="btn btn-danger">
                        <i class="bi bi-filter"></i> Limpar filtro
                    </a>
                </div>
                @component('components.filtros', [
                'url' => route('AdminColaboradores.index'),
                'nome' => isset($nome) ? $nome : null,
                'numero' => isset($numero) ? $numero : null,
                'genero' => isset($genero) ? $genero : null,
                'aniversario' => isset($aniversario) ? $aniversario : null,
                'cidade' => isset($cidade) ? $cidade : null,
                'estado' => isset($estado) ? $estado : null,
                'estadosBrasil' => $estadosBrasil ?? null,
                'marcas' => $marcas ?? null,
                'marca' => isset($marca) ? $marca : null,
                'status' => isset($status) ? $status : null,  
                ])
                @endcomponent
            </div>
            <div class="card-body adjustCardBody pt-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body pt-3 pb-4">
                                <div class="table-responsive">
                                    @if(count($usuarios) > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 min-w-150px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="{{route('AdminColaborador.editar', ['id' => $item->id])}}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{!! $item->nome !!}</a>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->email)
                                                        {!! $item->email !!}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">E-mail</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{route('AdminColaborador.editar', ['id' => $item->id])}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Nenhum usuário foi encontrado!</p>
                                    @endif
                                    <div class="contentPaginate mt-5 mb-5" style="margin: 0px;">
                                        {{ $usuarios->links('vendor.pagination.custom') }}
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
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>
<script>
</script>
@endsection