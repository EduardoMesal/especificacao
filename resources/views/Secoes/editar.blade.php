@extends('layouts.admin')
@section('title', 'Editar seção')

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
                                    <form class="form responseAjax" method="POST" action="{{route('Secoes.editar_action', ['id' => $secao->id, 'lang' => request('lang')])}}" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex align-items-center justify-content-between mb-5">
                                            <div class="text-center">
                                                <h2 class="">Editar seção</h2>
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
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Nome</span>
                                                </label>
                                                <input 
                                                    type="text" 
                                                    value="{{ optional($secao->secoesIdiomas->first())->nome }}" 
                                                    class="form-control form-control-solid" 
                                                    placeholder="Preencha o campo nome" 
                                                    name="nome" 
                                                />
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
<script>
</script>
@endsection