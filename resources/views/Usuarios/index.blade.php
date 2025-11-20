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
                    <div class="table-responsive">
                        <div class="card-header" style="padding: .5rem 0px; border-bottom:0px">
                            <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                                <h6 class="text-medium">Usuários</h6>
                                <div style="height: 19px; margin-right: 5px; position: relative">
                                    <button class="p-0 dropdown-modal" id="modalOpenFilter">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                    <div class="hidden modal-options-menu" data-modal="modalOpenFilter">
                                        <ul class="modal-options">
                                            <li class="dropdown-item">
                                                <a href="{{route('Usuario.criar')}}" class="link-modal">
                                                    <i class="bi bi-plus"></i> Criar usuário
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                            <thead>
                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                    <th class="p-0 w-50px"></th>
                                    <th class="p-0 min-w-200px"></th>
                                    <th class="p-0 min-w-200px"></th>
                                    <th class="p-0 w-100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol- symbol-40px me-3">
                                                <img src="{{ mixAssets('assets/img/users/' . $user->avatar) }}" class="img-thumbnail img-fluid" style="max-width: 50px;" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{!! $user->nome !!}</span>
                                                <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-gray-800 fw-bold d-block mb-1 fs-6">{!! $user->email !!}</span>
                                        <span class="fw-semibold text-gray-400 d-block">E-mail</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-800 fw-bold d-block mb-1 fs-6">
                                        @if($user->tipo == 'engenharia')
                                        Engenharia
                                        @elseif($user->tipo == 'vendas')
                                        Vendes
                                        @elseif($user->tipo == 'adm')
                                        Administrador
                                        @endif
                                        </span>
                                        <span class="fw-semibold text-gray-400 d-block">Tipo de usuário</span>
                                    </td>
                                    <td class="text-end">
                                        <div style="position: relative">
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



