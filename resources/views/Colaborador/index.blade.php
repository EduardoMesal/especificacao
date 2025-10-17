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
                ])
                @endcomponent
            </div>
            <div class="card-body adjustCardBody pt-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body pt-3 pb-4">
                                <div class="table-responsive">
                                    @if(count($clientes) > 0)
                                    <table class="table">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 min-w-150px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clientes as $item)
                                            <tr data-key="{{$item->id}}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="{{route('Colaborador.editar', ['id' => $item->id])}}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{!! $item->nome !!}</a>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->genero)
                                                        {!! $item->genero !!}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Gênero</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->aniversario)
                                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $item->aniversario)->format('d/m/Y'); }}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Data de nascimento</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                        @if($item->ultimoEnvio && $item->ultimoEnvio->enviado_data)
                                                        {{ \Carbon\Carbon::parse($item->ultimoEnvio->enviado_data)->locale('pt_BR')->diffForHumans() }}
                                                        @else
                                                        -
                                                        @endif
                                                    </a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Último envio</span>
                                                </td>
                                                <td class="border-0">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->numero)
                                                        {{ preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $item->numero) }}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Whatsapp</span>
                                                </td>
                                                <td class="border-0">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->cidade)
                                                        {!! $item->cidade !!}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Cidade</span>
                                                </td>
                                                <td class="border-0">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                                        @if($item->estado)
                                                        {!! $item->estado !!}
                                                        @else
                                                        -
                                                        @endif
                                                    </span>
                                                    <span class="fw-semibold text-gray-400 d-block">Estado</span>
                                                </td>

                                                <td class="text-end d-flex gap-5 justify-content-end">
                                                    <a href="{{route('Colaborador.editar', ['id' => $item->id])}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                    <form class="responseAjax" action="{{route('Colaborador.excluir', ['id' => $item->id])}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px deleteBt" type="submit">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Nenhum usuário foi encontrado!</p>
                                    @endif
                                    <div class="contentPaginate mt-5 mb-5" style="margin: 0px;">
                                        {{ $clientes->links('vendor.pagination.custom') }}
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