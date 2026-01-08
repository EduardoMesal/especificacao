@extends('layouts.admin')
@section('title', 'Usuários')

@section('css')
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                        <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                            <h6 class="text-medium">Usuários</h6>
                            <div style="height: 19px; margin-right: 5px; position: relative">
                                <button class="p-0 dropdown-modal" id="modalOpenFilter">
                                    <i class="lni lni-more-alt"></i>
                                </button>
                                <div class="hidden modal-options-menu" data-modal="modalOpenFilter">
                                    <ul class="modal-options">
                                        <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                           <a href="{{route('Usuario.criar')}}" class="link-modal">
                                                <i class="bi bi-plus"></i> Criar usuário
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Nome</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>E-mail</h6>
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
                                @if(count($usuarios) > 0)
                                @foreach($usuarios as $user)
                                <tr data-href="{{route('Usuario.editar', ['id' => $user->id])}}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $user->nome !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="{!! $user->email !!}"
                                                    style="width: 350px">
                                                    {!! $user->email !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if($user->tipo == 'engenharia')
                                                    Engenharia
                                                    @elseif($user->tipo == 'vendas')
                                                    Vendes
                                                    @elseif($user->tipo == 'adm')
                                                    Administrador
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$user->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$user->id}}">
                                                <ul class="modal-options">
                                                    <li class="dropdown-item">
                                                        <a class="link-modal" href="{{route('Usuario.editar', ['id' => $user->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <form class="responseAjax" action="{{route('Usuario.excluir', ['id' => $user->id])}}" method="post">
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
<script>
</script>
@endsection



