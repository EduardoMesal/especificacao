@extends('layouts.admin')
@section('title', 'Usuários')

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
                                    <div class="fs-6 text-gray-800 mb-2">Usuários</div>
                                </div>
                                <div class="d-flex gap-5 btnsAside">
                                    <a href="{{route('Usuario.criar')}}" class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Criar usuário
                                    </a>
                                </div>
                            </div>
                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 min-w-200px"></th>
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
                                                    <img src="{{ mixAssets('assets/img/users/' . $user->avatar) }}" class="" alt="" />
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
                                            <div class="adjustBtnsUser gap-5">
                                                <a href="{{route('Usuario.editar', ['id' => $user->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                                <form class="responseAjax" action="{{route('Usuario.excluir', ['id' => $user->id])}}" method="post">
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
                        </div>
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



