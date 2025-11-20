@extends('layouts.admin')
@section('title', 'Editar cliente')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Clientes.editar_action', ['id' => $cliente->id])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center">
                                            <h2 class="">Editar cliente</h2>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" value="{{$cliente->nome}}" class="bg-transparent" placeholder="Preencha o campo nome" name="nome" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">CNPJ</span>
                                                </label>
                                                <input type="text" value="{{$cliente->cnpj}}" class="bg-transparent mask-cnpj" placeholder="Preencha o campo cnpj" name="cnpj" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">IE</span>
                                                </label>
                                                <input type="text" value="{{$cliente->ie}}" class="bg-transparent" placeholder="Preencha o campo ie" name="ie" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Contato comercial</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->contato_comercial ?? ''}}" class="bg-transparent" placeholder="Preencha o campo contato" name="contato_comercial" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Telefone comercial</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->telefone_comercial ?? ''}}" class="bg-transparent" placeholder="Preencha o campo telefone" name="telefone_comercial" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">E-mail comercial</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->email_comercial ?? ''}}" class="bg-transparent" placeholder="Preencha o campo e-mail" name="email_comercial" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Contato técnico</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->contato_tecnico ?? ''}}" class="bg-transparent" placeholder="Preencha o campo contato" name="contato_tecnico" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Telefone técnico</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->telefone_tecnico ?? ''}}" class="bg-transparent" placeholder="Preencha o campo telefone" name="telefone_tecnico" />
                                            </div>
                                            <div class="col-md-4 fv-row input-style-1">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">E-mail técnico</span>
                                                </label>
                                                <input type="text" value="{{$cliente->clienteInformacoes->email_tecnico ?? ''}}" class="bg-transparent" placeholder="Preencha o campo e-mail" name="email_tecnico" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                                <span class="indicator-label">Atualizar</span>
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
</div>

@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
    $(document).ready(function() {

    });
</script>
@endsection