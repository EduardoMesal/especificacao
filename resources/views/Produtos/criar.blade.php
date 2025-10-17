@extends('layouts.admin')
@section('title', 'Criar produto')

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
                                <form class="form responseAjax" method="POST" action="{{route('Produtos.criar_action')}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Crie um produto</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-12 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                        <div class="col-md-12 mb-8 fv-row ckEditorView">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="notRequired">Avisos</span>
                                            </label>
                                            <textarea name="aviso" id="texto-2" class="form-control ckText">
                                            </textarea>
                                        </div>
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
@endsection

@section('plugins')
<script>
</script>
@endsection