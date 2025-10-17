@extends('layouts.admin')
@section('title', 'Criar cliente')

@section('css')
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-6 mb-xl-9">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start flex-wrap mb-2">
                            <div class="flex-column">
                                <form class="form responseAjax" method="POST" action="{{route('Colaborador.criar_action')}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Crie um cliente</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Nome</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo nome" name="nome" />
                                        </div>
                                        <div class="col-md-6 fv-row selectArea">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Gênero</span>
                                            </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Gênero" name="genero">
                                                <option></option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row selectArea">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Marcas</span>
                                            </label>
                                            <select class="form-select form-select-solid" id="select2Multiple" data-control="select2" data-hide-search="true" data-placeholder="Selecionar marca(s)" name="marcas[]" multiple>
                                                @foreach($marcas as $item)
                                                <option value="{{$item->id}}">{!! $item->nome !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">WhatsApp</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid form_control--mask-phone" placeholder="Preencha o campo WhatsApp" name="numero" />
                                        </div>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Cidade</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo cidade" name="cidade" />
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Estado</span>
                                            </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Estado" name="estado">
                                                <option value=""></option>
                                                @foreach($estados as $item)
                                                <option value="{{$item->uf}}">{!! $item->nome !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Data de nascimento</span>
                                            </label>
                                            <input type="date" class="form-control form-control-solid" placeholder="Preencha o campo estado" name="aniversario" />
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Profissão</span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Preencha o campo profissão" name="profissao" />
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
    <!--end::Container-->
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