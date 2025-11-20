@extends('layouts.admin')
@section('title', 'Criar cliente')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Secoes.criar_action')}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-5 text-center">
                                            <h2 class="">Crie uma seção</h2>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-12 fv-row input-style-1"">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
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
</div>
@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#select2Multiple').select2({
            minimumResultsForSearch: Infinity,
            language: 'pt-BR'
        });
    });
</script>
@endsection