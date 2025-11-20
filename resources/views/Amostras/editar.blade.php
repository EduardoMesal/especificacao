@extends('layouts.admin')
@section('title', 'Editar amostra')

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
                                <form class="form responseAjax" method="POST" action="{{route('Amostras.editar_action', ['id' => $amostra->id, 'lang' => request('lang')])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-between mb-5">
                                        <div class="text-center">
                                            <h2 class="">Editar amostra</h2>
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
                                        <div class="col-md-12 fv-row input-style-1">
                                            <label class="d-flex align-items-center fs-6 mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" value="{{ optional($amostra->amostrasIdiomas->first())->nome }}" class="bg-transparent" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-8 fv-row ckEditorView">
                                        <label class="d-flex align-items-center fs-6 mb-2">
                                            <span class="notRequired">Avisos</span>
                                        </label>
                                        <textarea name="aviso" id="texto-2" class="form-control ckText">
                                            {{ optional($amostra->amostrasIdiomas->first())->aviso }}
                                        </textarea>
                                    </div>
                                    <div class="text-center pt-30">
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
<div class="section pt-40" id="kt_post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                        <h6 class="text-medium ">Atributos</h6>
                        <div style="height: 19px; margin-right: 5px; position: relative">
                            <button class="p-0 dropdown-modal" id="modalOpenFilter">
                                <i class="lni lni-more-alt"></i>
                            </button>
                            <div class="hidden modal-options-menu" data-modal="modalOpenFilter">
                                <ul class="modal-options">
                                    <li class="dropdown-item">
                                        <a href="{{route('Amostras.criar_atributo', ['id' => $amostra->id])}}" class="link-modal">
                                            <i class="bi bi-plus"></i> Adicionar atributo
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Nome</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Tipo</h6>
                                    </th>
                                    <th class="th-info text-end">
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($amostra->atributos) > 0)
                                @foreach($amostra->atributos as $item)
                                <tr data-href="{{route('Amostras.editar_atributo', ['id' => $item->id])}}">
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
                                                <span class="limite-texto text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {{ optional($item->atributosAmostrasIdiomas->first())->nome }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
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
                                    </td>
                                    <td class="text-end">
                                        <div style="position: relative">
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterAmostra{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterAmostra{{$item->id}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('Amostras.editar_atributo', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('Amostras.excluir_amostra_atributo', ['id' => $item->id])}}" method="post">
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
<script src="{{ mixAssets('/assets/js/jquery.repeater.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/form-repeater.init.js') }}"></script>
<script>
</script>
@endsection