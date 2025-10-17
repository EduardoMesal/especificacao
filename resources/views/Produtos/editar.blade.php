@extends('layouts.admin')
@section('title', 'Editar produto')

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
                                <form class="form responseAjax" method="POST" action="{{route('Produtos.editar_action', ['id' => $produto->id, 'lang' => request('lang')])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-between mb-5">
                                        <div class="text-center">
                                            <h1 class="">Editar produto</h1>
                                        </div>
                                        <div class="pull-right">
                                            <div class="btn-group dropleft position-relative">
                                                <a href="javascript:void(0);" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <img src="{{ asset('/assets/img/flags/' . $idioma->icone) }}" style="width: 22px;">&nbsp;&nbsp;{!! $idioma->nome !!}
                                                </a>

                                                <ul class="dropdown-menu position-absolute top-100">
                                                    @foreach ($idiomas as $key => $value)
                                                        <li class="navi-item p-2">
                                                            <a href="{{ request()->fullUrlWithQuery(['lang' => $value->codigo]) }}" class="navi-link">
                                                                <img src="{{ asset('/assets/img/flags/' . $value->icone) }}" class="img-thumbnail" style="max-width: 30px;">&nbsp;{!! $value->nome !!}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-12 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" value="{{ optional($produto->produtosIdiomas->first())->nome }}"  class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-8 fv-row ckEditorView">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="notRequired">Avisos</span>
                                        </label>
                                        <textarea name="aviso" id="texto-2" class="form-control ckText">
                                        {{ optional($produto->produtosIdiomas->first())->aviso }}
                                        </textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                            <span class="indicator-label">Enviar</span>
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
<div class=" post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="row gy-5 g-xl-10">
            <div class="col-xl-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-body pt-3 pb-4">
                        <div class="table-responsive">
                            <div class="card-header mt-5" style="padding: .5rem 0px; border-bottom:0px">
                                <div class="card-title flex-column">
                                    <div class="fs-6 text-gray-800 mb-2">Atributos</div>
                                </div>
                                <div class="d-flex gap-5 btnsAside">
                                    <a href="{{route('Produtos.criar_atributo', ['id' => $produto->id])}}" class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Adicionar atributo
                                    </a>
                                </div>
                            </div>
                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 w-0px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 w-100px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($produto->atributos) > 0)
                                    @foreach($produto->atributos as $item)
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
                                                        {{ optional($item->atributosProdutosIdiomas->first())->nome }}
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                        @if($item->tipo == 'selecionavel')
                                                        Selecionável
                                                        @elseif($item->tipo == 'multiplos')
                                                        Múltiplos
                                                        @else
                                                        Texto
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-gray-400 d-block">Tipo</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="adjustBtnsUser gap-5">
                                                <a href="{{route('Produtos.editar_atributo', ['id' => $item->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar
                                                </a>
                                                <form class="responseAjax" action="{{route('Produtos.excluir_produto_atributo', ['id' => $item->id])}}" method="post">
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
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>
<script>
</script>
@endsection