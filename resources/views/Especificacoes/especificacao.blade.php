@extends('layouts.admin')
@section('title', 'Especificação ' . $especificacao->id)
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                   <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div class="flex-grow-1">
                            <div class="justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-md-row flex-column justify-content-between align-items-center">
                                    <div class="btn-group dropleft btn-idiomas" style="height: fit-content;">
                                        <a href="javascript:void(0);" class="dropdown-modal" id="modalOpenIdiomas" style="color: #000;">
                                            <img src="{{ asset('/assets/img/flags/' . $idioma->icone) }}" style="width: 22px;">&nbsp;&nbsp;{!! $idioma->nome !!}
                                        </a>
                                        <div class="hidden modal-options-menu" data-modal="modalOpenIdiomas">
                                            <ul class="modal-options modal-options-idiomas" style="margin-top: 20px;">
                                                 @foreach ($idiomas as $key => $value)
                                                    <li class="dropdown-item link-modal">
                                                        <a href="{{ request()->fullUrlWithQuery(['lang' => $value->codigo]) }}" class="navi-link link-modal">
                                                            <img src="{{ asset('/assets/img/flags/' . $value->icone) }}" class="img-thumbnail" style="max-width: 30px;">&nbsp;{!! $value->nome !!}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center buttonAccordion">
                                        <a href="{{ route('Especificacoes.editar', ['id' => $especificacao->id]) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Editar especificação
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="icon-card mb-4">
                            <div class="icon blue-light">
                                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"></path>
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10 text-bold">Código Focco</h6>
                                <p class="mb-10">
                                    @if($especificacao->codigo_focco)
                                    {!! $especificacao->codigo_focco !!}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="icon-card mb-4">
                            <div class="icon success">
                                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10 text-bold">Cliente</h6>
                                @php
                                    $clientName = $especificacao->pedido->cliente->nome;
                                @endphp
                                <div class="isComparavel"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="{{ $clientName }}">
                                    <p class="mb-10 limite-texto" style="width: 170px">
                                        @if($especificacao->pedido->cliente)
                                        {!! $especificacao->pedido->cliente->nome !!}
                                        @else
                                        -
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="icon-card mb-4 mb-sm-0">
                            <div class="icon orange">
                                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10 text-bold">Série</h6>
                                <p class="mb-10">
                                    @if($especificacao->serie)
                                    {!! $especificacao->serie !!}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="icon-card">
                            <div class="icon primary">
                                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="mb-10 text-bold">Máquina</h6>
                                @php
                                    $machineName = optional($especificacao->maquina->maquinasIdiomas->first())->nome;
                                @endphp
                                <div class="isComparavel"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="{{ $machineName }}">
                                    <p class="mb-10 limite-texto" style="width: 170px">
                                        @if($especificacao->maquina)
                                            {{ optional($especificacao->maquina->maquinasIdiomas->first())->nome }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12 donult-bar">
                <div class="card-style">
                    <div class="title d-flex flex-wrap align-items-center justify-content-between">
                        <div class="left">
                            <h6 class=" text-bold">Especificação</h6>
                        </div>
                    </div>
                    <div class="chart">
                        <div id="donutEspecificacao" style="width: 100%; height: 201px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseEspecificacoes" aria-expanded="false" aria-controls="collapseEspecificacoes">
                                Especificação
                            </button>
                        </h2>
                        <div id="collapseEspecificacoes" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="card-body adjustCardBody">
                                    <div class="position-relative d-flex justify-content-end mb-3">
                                        <button class="btn btn-sm btn-primary dropdown-modal" id="modalOpenExports">
                                            <i class="bi bi-file-earmark-word-fill"></i> Exportar
                                        </button>
                                        <div class="hidden modal-options-menu" data-modal="modalOpenExports">
                                            <ul class="modal-options" style="margin-top: 30px;">
                                                <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                    <a class="link-modal" 
                                                        href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'lang' => request('lang'), 'tipo' => 'especificacao']) }}">
                                                        Especificações
                                                    </a>
                                                </li>
                                                <!-- <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                    <a class="link-modal" 
                                                        href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'lang' => request('lang'), 'tipo' => 'amostras']) }}">
                                                        Amostras
                                                    </a>
                                                </li>
                                                    <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                    <a class="link-modal" 
                                                        href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'lang' => request('lang'), 'tipo' => 'produtos']) }}">
                                                        Produtos
                                                    </a>
                                                </li>
                                                    <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                    <a class="link-modal" 
                                                        href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'lang' => request('lang'), 'tipo' => 'completa']) }}">
                                                        Completa
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mb-5 input-style-1">
                                        <select data-original="<?= $especificacao->revisao_selecionada_id ?>" class="form-select form-select-solid selectRv" data-control="select2" data-hide-search="true" data-placeholder="Selecionar revisão" name="revisao">
                                            @foreach ($revisoes as $rev)
                                                <option @if($especificacao->revisao_selecionada_id == $rev['id']) selected @endif value="{{ $rev['id'] }}">{{ $rev['revisao'] }} - {{$rev['usuario']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="accordion" id="accordionEspecificacoes">
                                        <div class="accordion-item" style="margin-bottom: 15px;">
                                            <h2 class="accordion-header" id="headingEspecificacoes">
                                                <button class="accordion-button collapsed" style="font-weight: bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEspecificacoes2" aria-expanded="true" aria-controls="collapseEspecificacoes2">
                                                Resumo das especificações
                                                </button>
                                            </h2>
                                            <div id="collapseEspecificacoes2" class="accordion-collapse collapse" aria-labelledby="headingEspecificacoes">
                                                <div class="accordion-body">
                                                    @php
                                                        $renderizados = [];
                                                        $multiplosAgrupados = collect($resumoItens)->where('tipo', 'multiplos')->groupBy('caracteristica');
                                                    @endphp
                                                    <ul class="list-group resumoContent">
                                                        @if(count($resumoItens) > 0)
                                                            @foreach ($resumoItens as $resumo)
                                                                {{-- MULTIPLOS: renderizar agrupado por caracteristica, apenas 1 vez --}}
                                                                @if($resumo['tipo'] === 'multiplos')
                                                                    @if(!in_array($resumo['caracteristica'], $renderizados))
                                                                        @php $renderizados[] = $resumo['caracteristica']; @endphp

                                                                        <li class="p-3 bg-light rounded-2 border border-light position-relative {{ $resumo['excluido'] ? 'disabledList' : ''}}">
                                                                            <div><span style="font-weight: 600; color: #000">
                                                                                @if ($resumo['caracteristica'])
                                                                                    {!! $resumo['caracteristica'] !!}:
                                                                                    @else
                                                                                    {{__('messages.nao_informado')}}:
                                                                                @endif
                                                                            </span></div>
                                                                            @foreach($multiplosAgrupados[$resumo['caracteristica']] as $item)
                                                                                <div>
                                                                                    <span style="font-weight: 600; color: #000">
                                                                                    @if($item['atributo'])
                                                                                    {{ $item['atributo'] }}: 
                                                                                    @else
                                                                                    {{__('messages.nao_informado')}}:
                                                                                    @endif
                                                                                    </span>
                                                                                    @if($item['conteudo'])
                                                                                    {{ $item['conteudo'] }}{{ $item['unidade'] ? ' '. $item['unidade'] : '' }};
                                                                                    @else
                                                                                        <span>{{__('messages.nao_informado')}};</span>
                                                                                    @endif
                                                                                </div>
                                                                                @if($item['observacao'])
                                                                                    <div class="obsText">OBS: {!! $item['observacao'] !!}</div>
                                                                                @endif
                                                                            @endforeach
                                                                        </li>
                                                                    @endif

                                                                {{-- SELECIONÁVEL ou TEXTO --}}
                                                                @else
                                                                    <li class="p-3 bg-light rounded-2 border border-light position-relative {{ $resumo['excluido'] ? 'disabledList' : ''}}">
                                                                        @if($resumo['comparavel'])
                                                                            <div class="isComparavel" 
                                                                                data-bs-toggle="tooltip" 
                                                                                data-bs-placement="top"
                                                                                data-bs-custom-class="custom-tooltip"
                                                                                data-bs-title="Este item é comparável.">
                                                                                <i class="bi bi-bookmark-fill"></i>
                                                                            </div>
                                                                        @endif

                                                                        <div class="flex-grow-1">
                                                                            <span style="font-weight: 600; color: #000">
                                                                                @if ($resumo['caracteristica'])
                                                                                    {!! $resumo['caracteristica'] !!}:
                                                                                    @else
                                                                                    {{__('messages.nao_informado')}}:
                                                                                @endif
                                                                            </span>
                                                                            @if($resumo['tipo'] === 'selecionavel' && $resumo['atributo'])
                                                                                {{ $resumo['atributo'] }}{{ $resumo['atributo'] != 'PERSONALIZADO' ? ($resumo['unidade'] ? ' '. $resumo['unidade'] : '') : '' }};
                                                                            @elseif($resumo['tipo'] === 'texto' && $resumo['conteudo'])
                                                                                {{ $resumo['conteudo'] }}{{ $resumo['unidade'] ? ' '. $resumo['unidade'] : '' }};
                                                                            @else
                                                                                <span>{{__('messages.nao_informado')}};</span>
                                                                            @endif
                                                                        </div>

                                                                        @if($resumo['observacao'])
                                                                            <div class="obsText">OBS: {!! $resumo['observacao'] !!}</div>
                                                                        @endif

                                                                        @if($resumo['excluido'])
                                                                            <form class="responseAjax" action="{{ route('Especificacoes.excluir_caracteristica', ['id' => $resumo['caracteristica_id']]) }}" method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input type="hidden" name="especificacao_id" value="{{ $especificacao->id }}">
                                                                                <button class="btn btn-sm btn-primary deleteBt" type="submit">
                                                                                    <i class="bi bi-trash"></i> Excluir
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <li class="p-3 bg-light rounded-2 border border-light position-relative">Nenhuma especificação foi encontrada.</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="accordion-item" style="margin-bottom: 15px;">
                                            <h2 class="accordion-header" id="headingAmostras">
                                                <button class="accordion-button collapsed" style="font-weight: bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmostrasGerais" aria-expanded="false" aria-controls="collapseAmostrasGerais">
                                                Resumo das amostras
                                                </button>
                                            </h2>
                                            <div id="collapseAmostrasGerais" class="accordion-collapse collapse" aria-labelledby="headingAmostras">
                                                <div class="accordion-body">
                                                    <div class="resumoContent">
                                                    @if (count($dadosPorAmostra) > 0)
                                                        @foreach ($dadosPorAmostra as $indice => $indiceAtt)
                                                            @php
                                                                $indice_modelo = 0;
                                                            @endphp
                                                                    
                                                            @foreach ($indiceAtt as $key => $atributos)
                                                                @php
                                                                    $indice_modelo = $indice_modelo + 1;
                                                                @endphp
                                                                @php
                                                                    $amostraIndiceId = $atributos[0]['indice_amostra_id'] ?? null;
                                                                    $temImagem = \App\Models\ImagemAmostra::where('amostra_indice_id', $amostraIndiceId)->exists();
                                                                @endphp

                                                                @php
                                                                    $agrupados = collect($atributos)->groupBy('atributo_id');
                                                                @endphp
                                                                <h4 style="margin-bottom: 2px;">{{ $indice }}</h4>
                                                                <span style="font-size: 13px; font-style: italic; display: block; margin-top: -2px; margin-bottom: 5px;">
                                                                    Modelo {{ $indice_modelo }}
                                                                </span>
                                                                <ul class="list-group"> 
                                                                    @foreach ($agrupados as $grupo)
                                                                       
                                                                        @php $primeiro = $grupo->first(); @endphp
                                                                        @if (strtolower($primeiro['sub_atributo_nome']) !== 'n/a')
                                                                            @if ($primeiro['atributo_tipo'] === 'multiplos')
                                                                                <li class="p-3 bg-light rounded-2 border border-light position-relative">
                                                                                {{ $primeiro['atributo_nome'] }}:
                                                                                @if(count($grupo[0]['imagens']) > 0)
                                                                                <div class="contentResumoImg">
                                                                                        @foreach ($grupo[0]['imagens'] as $img)
                                                                                            <img src="{{ mixAssets('assets/img/amostras/atributos/' . $img->imagem) }}" alt="Imagem da amostra">
                                                                                        @endforeach
                                                                                    </div>
                                                                                    @endif
                                                                                    <div class="mt-2">
                                                                                        @foreach ($grupo as $item)
                                                                                            <div class="">
                                                                                                <span style="font-weight: 600;">
                                                                                                    @if ($item['sub_atributo_nome'])
                                                                                                        {{ $item['sub_atributo_nome'] }}:
                                                                                                        @else
                                                                                                        {{__('messages.nao_informado')}}: 
                                                                                                    @endif
                                                                                                </span>
                                                                                                @if($item['conteudo'])
                                                                                                    {{ $item['conteudo'] }}{{ $item['atributo_unidade'] ? ' ' . $item['atributo_unidade'] : '' }};
                                                                                                @else
                                                                                                    <span>{{__('messages.nao_informado')}};</span>
                                                                                                @endif

                                                                                                @if($item['observacao_personalizada'])
                                                                                                    <span class="obsText">OBS: {!! $item['observacao_personalizada'] !!}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </li>
                                                                            @elseif (in_array($primeiro['atributo_tipo'], ['selecionavel', 'texto']))
                                                                                @foreach ($grupo as $item)
                                                                                    <li class="p-3 bg-light rounded-2 border border-light position-relative">
                                                                                        <span style="font-weight: 600; color: #000">
                                                                                            @if ($item['atributo_nome'])
                                                                                                {{ $item['atributo_nome'] }}:
                                                                                            @else
                                                                                                {{__('messages.nao_informado')}}: 
                                                                                            @endif
                                                                                        </span>
                                                                                        @php
                                                                                            $valor = '';
                                                                                            if (!empty($item['sub_atributo_nome'])) {
                                                                                                $valor = $item['sub_atributo_nome'];
                                                                                            } elseif (!empty($item['conteudo'])) {
                                                                                                $valor = $item['conteudo'];
                                                                                            }

                                                                                            if (!empty($valor)) {
                                                                                                $valor .= !empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '';
                                                                                                $valor .= ';';
                                                                                            } else {
                                                                                                $valor = '<span>' . __('messages.nao_informado') . ';</span>';
                                                                                            }
                                                                                        @endphp

                                                                                        {!! $valor !!}

                                                                                        @if($item['observacao_personalizada'])
                                                                                            <br><span class="obsText">OBS: {!! $item['observacao_personalizada'] !!}</span>
                                                                                        @endif

                                                                                        @if(count($item['imagens']) > 0)
                                                                                            <div class="contentResumoImg contentResumoImgSpace">
                                                                                                @foreach ($item['imagens'] as $img)
                                                                                                    <img src="{{ mixAssets('assets/img/amostras/atributos/' . $img['imagem']) }}"/>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    @if ($temImagem)
                                                                        @php
                                                                            $imagens = \App\Models\ImagemAmostra::where('amostra_indice_id', $amostraIndiceId)->get();
                                                                        @endphp
                                                                        @if(count($imagens) > 0)
                                                                        <h5>Imagens</h5>
                                                                        <div class="contentResumoImg list-group p-3 bg-light rounded-2 border border-light position-relative mt-2"> 
                                                                            @foreach ($imagens as $img)
                                                                                <img src="{{ mixAssets('assets/img/amostras/' . $img->imagem) }}" alt="Imagem da amostra">
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                    @endif
                                                                </ul>
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        <li class="p-3 bg-light rounded-2 border border-light position-relative">Nenhuma amostra foi encontrada.</li>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item" style="margin-bottom: 15px;">
                                            <h2 class="accordion-header" id="headingProdutos">
                                                <button class="accordion-button collapsed" style="font-weight: bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProdutosGerais" aria-expanded="false" aria-controls="collapseProdutosGerais">
                                                Resumo dos produtos
                                                </button>
                                            </h2>
                                            <div id="collapseProdutosGerais" class="accordion-collapse collapse" aria-labelledby="headingProdutos">
                                                <div class="accordion-body">
                                                    <div class="resumoContent">
                                                        @if (count($dadosPorProduto) > 0)
                                                            @foreach ($dadosPorProduto as $indice => $indiceAtt)
                                                                @php
                                                                    $indice_modelo = 0;
                                                                @endphp
                                                                @foreach ($indiceAtt as $key => $atributos)
                                                                    @php
                                                                        $indice_modelo = $indice_modelo + 1;
                                                                    @endphp
                                                                    <h4 style="margin-bottom: 2px;">{{ $indice }}</h4>
                                                                    <span style="font-size: 13px; font-style: italic; display: block; margin-top: -2px; margin-bottom: 5px;">
                                                                        Modelo {{ $indice_modelo }}
                                                                    </span>
                                                                    @php
                                                                        $produtoIndiceId = $atributos[0]['indice_produto_id'] ?? null;
                                                                        $temImagem = \App\Models\ImagemProduto::where('produto_indice_id', $produtoIndiceId)->exists();
                                                                    @endphp

                                                                    @php
                                                                        $agrupados = collect($atributos)->groupBy('atributo_produto_id');
                                                                    @endphp

                                                                    <ul class="list-group">
                                                                        @foreach ($agrupados as $grupo)
                                                                            @php $primeiro = $grupo->first(); @endphp
                                                                            @if (strtolower($primeiro['sub_atributo_nome']) !== 'n/a')

                                                                                @if ($primeiro['atributo_tipo'] === 'multiplos')
                                                                                    <li class="p-3 bg-light rounded-2 border border-light position-relative">
                                                                                    {{ $primeiro['atributo_nome'] }}:
                                                                                    @if(count($grupo[0]['imagens']) > 0)
                                                                                        <div class="contentResumoImg">
                                                                                            @foreach ($grupo[0]['imagens'] as $img)
                                                                                                <img src="{{ mixAssets('assets/img/produtos/atributos/' . $img->imagem) }}" alt="Imagem do produto">
                                                                                            @endforeach
                                                                                        </div>
                                                                                        @endif
                                                                                        <div class="mt-2">
                                                                                            @foreach ($grupo as $item)
                                                                                                <div class="">
                                                                                                    <span style="font-weight: 600;">
                                                                                                        @if($item['sub_atributo_nome'])
                                                                                                            {{ $item['sub_atributo_nome'] }}: 
                                                                                                        @else
                                                                                                            {{__('messages.nao_informado')}}: 
                                                                                                        @endif
                                                                                                    </span>
                                                                                                    @if($item['conteudo'])
                                                                                                        {{ $item['conteudo'] }}{{ $item['atributo_unidade'] ? ' ' . $item['atributo_unidade'] : '' }};
                                                                                                    @else
                                                                                                        <span>{{__('messages.nao_informado')}};</span>
                                                                                                    @endif

                                                                                                    @if($item['observacao_personalizada'])
                                                                                                        <span class="obsText">OBS: {!! $item['observacao_personalizada'] !!}</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </li>
                                                                                @elseif (in_array($primeiro['atributo_tipo'], ['selecionavel', 'texto']))
                                                                                    @foreach ($grupo as $item)
                                                                                        <li class="p-3 bg-light rounded-2 border border-light position-relative">
                                                                                            <span style="font-weight: 600; color: #000">
                                                                                                @if($item['atributo_nome'])
                                                                                                    {{ $item['atributo_nome'] }}:
                                                                                                @else
                                                                                                    {{__('messages.nao_informado')}}:
                                                                                                @endif
                                                                                            </span>
                                                                                            @php
                                                                                                $valor = '';
                                                                                                if (!empty($item['sub_atributo_nome'])) {
                                                                                                    $valor = $item['sub_atributo_nome'];
                                                                                                } elseif (!empty($item['conteudo'])) {
                                                                                                    $valor = $item['conteudo'];
                                                                                                }

                                                                                                if (!empty($valor)) {
                                                                                                    $valor .= !empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '';
                                                                                                    $valor .= ';';
                                                                                                } else {
                                                                                                    $valor = '<span>' . __('messages.nao_informado') . ';</span>';
                                                                                                }
                                                                                            @endphp

                                                                                            {!! $valor !!}

                                                                                            @if($item['observacao_personalizada'])
                                                                                                <br><span class="obsText">OBS: {!! $item['observacao_personalizada'] !!}</span>
                                                                                            @endif

                                                                                            @if(count($item['imagens']) > 0)
                                                                                                <div class="contentResumoImg contentResumoImgSpace">
                                                                                                    @foreach ($item['imagens'] as $img)
                                                                                                        <img src="{{ mixAssets('assets/img/produtos/atributos/' . $img['imagem']) }}"/>
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            @endif
                                                                                        </li>
                                                                                    @endforeach
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        @if ($temImagem)
                                                                            @php
                                                                                $imagens = \App\Models\ImagemProduto::where('produto_indice_id', $produtoIndiceId)->get();
                                                                            @endphp
                                                                            @if(count($imagens) > 0)
                                                                            <h5>Imagens</h5>
                                                                            <div class="contentResumoImg list-group p-3 bg-light rounded-2 border border-light position-relative mt-2"> 
                                                                                @foreach ($imagens as $img)
                                                                                    <img src="{{ mixAssets('assets/img/produtos/' . $img->imagem) }}" alt="Imagem do produto">
                                                                                @endforeach
                                                                            </div>
                                                                            @endif
                                                                        @endif
                                                                    </ul>
                                                                @endforeach
                                                            @endforeach
                                                        @else
                                                            <li class="p-3 bg-light rounded-2 border border-light position-relative">Nenhum produto foi encontrado.</li>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingObservacoes">
                                                <button class="accordion-button collapsed" style="font-weight: bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseObservacoes" aria-expanded="false" aria-controls="collapseObservacoes">
                                                    Observações
                                                </button>
                                            </h2>
                                            <div id="collapseObservacoes" class="accordion-collapse collapse" aria-labelledby="headingObservacoes">
                                                <div class="accordion-body">
                                                    <div class="resumoContent">
                                                        <ul class="list-group">
                                                        @if (count($especificacao->observacoes) > 0)
                                                            @foreach ($especificacao->observacoes as $key => $observacao)
                                                                <li class="p-3 bg-light rounded-2 border border-light position-relative"><span style="font-weight: 600; color: #000">Observação {!! $key + 1 !!}:</span style="font-weight: 600; color: #000"> {!! $observacao->conteudo !!}</li>
                                                            @endforeach
                                                        @else
                                                            <li class="p-3 bg-light rounded-2 border border-light position-relative">Nenhuma observação foi encontrada.</li>
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseRevisoes" aria-expanded="false" aria-controls="collapseRevisoes">
                               Histórico de revisões
                            </button>
                        </h2>
                         <div id="collapseRevisoes" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>Revisão</h6>
                                                </th>
                                                <th>
                                                    <h6>Criador</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($revisoes) > 0)
                                                @foreach($revisoes as $item)
                                                    <tr onclick="getRevisao(this, {{ $item['id'] }})" data-bs-toggle="modal" data-bs-target="#modalRevisao--{{$item['id']}}" data-open="false">
                                                        <td>
                                                            <div class="d-flex gap-3 align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                                            {{ $item['revisao'] }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        {{ $item['usuario'] }}
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modalRevisao--{{ $item['id'] }}" tabindex="-1">
                                                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        {{ $item['revisao'] }} - {{ $item['usuario'] }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div id="spinnerModalRevisao--{{ $item['id'] }}" class="text-center py-5">
                                                                        <div class="spinner-border text-primary"></div>
                                                                    </div>

                                                                    {{-- partial --}}
                                                                    <div id="modalRevisaoContent--{{ $item['id'] }}"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion tab-content" id="tabSimilares">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseSimilares" aria-expanded="false" aria-controls="collapseSimilares">
                                Similares
                            </button>
                        </h2>
                        <div id="collapseSimilares" class="accordion-collapse collapse">
                            <div class="accordion-body" id="similares">
                                <div class="tab-pane" id="similares" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tabelaAmostras" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="th-info">Espec. ID</th>
                                                    <th class="th-info">Máquina</th>
                                                    <th class="th-info">Serie</th>
                                                    <th class="th-info">Similar (%)</th>
                                                    <th class="th-info">Comparação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($listaComparacao as $amostra)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('Especificacoes.especificacao', ['id' => $amostra['especificacao_id']]) }}">
                                                                {{$amostra['especificacao_id']}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Especificacoes.especificacao', ['id' => $amostra['especificacao_id']]) }}">
                                                                @php
                                                                    $tooltip = "Características comparadas:<br/>". collect($amostra['nomesAtributos'])
                                                                        ->map(fn($nome) => "{$nome} <br/>")
                                                                        ->implode(' ');
                                                                @endphp
                                                                <span 
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    data-bs-custom-class="custom-tooltip"
                                                                    data-bs-title="{!! $tooltip !!}"
                                                                    class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                                    {{ $amostra['maquina'] }}
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $amostra['serie'] }}</td>
                                                        <td data-order="{{ $amostra['porcentagem_similaridade'] }}">{{ $amostra['porcentagem_similaridade'] }}%</td>
                                                        <td>
                                                            <button class="btn btn-light" onclick="getComparacao(this, {{ $amostra['especificacao_id'] }})" data-bs-toggle="modal" data-bs-target="#modalComparacao--{{$amostra['especificacao_id']}}" data-open="false">
                                                                Ver comparação
                                                            </button>    
                                                            <div class="modal fade" id="modalComparacao--{{$amostra['especificacao_id']}}" role="dialog">
                                                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                                    <div class="modal-content accordion">
                                                                        <div class="modal-header">
                                                                            <div>
                                                                                <h5 class="modal-title align-self-center" id="modalComparacao--{{$amostra['especificacao_id']}}">
                                                                                    Especificação {{$amostra['especificacao_id']}}
                                                                                </h5>
                                                                                @if(isset($amostra['serie']))
                                                                                    <p>Serie: {{$amostra['serie']}}
                                                                                @endif
                                                                            </div>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12 mb-5 fv-row">
                                                                                    <div id="spinnerModal--{{ $amostra['especificacao_id']}}" class="text-center py-5 hidden">
                                                                                        <div class="spinner-border text-primary"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light"
                                                                                onclick="exportarParaWord('modalComparacao--{{$amostra['especificacao_id']}}', {{$amostra['especificacao_id']}}, '{{ $amostra['serie'] ?? '' }}')">
                                                                                Exportar para Word
                                                                            </button>
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="contentPaginate mb-0 mt-4">
                                            {{ $especificacoesMaquinas->links('vendor.pagination.custom') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseAmostras" aria-expanded="false" aria-controls="collapseAmostras">
                                Amostras
                            </button>
                        </h2>
                        <div id="collapseAmostras" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                    @if(count($maquinaAmostras) > 0)
                                    <div class="card-toolbar d-flex justify-content-center justify-content-md-end" style="position: relative;">
                                        <button class="btn btn-primary justify-content-center justify-content-md-end dropdown-modal"  id="modalOpenAmostras">Adicionar amostras</button>
                                        <div class="hidden modal-options-menu" data-modal="modalOpenAmostras">
                                            <ul class="modal-options" style="margin-top: 30px;">
                                                @if(count($maquinaAmostras) > 0)
                                                    @foreach($maquinaAmostras as $item)
                                                        <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                            <a class="link-modal" 
                                                            href="{{ route('Especificacoes.criar_amostra', ['especificacaoId' => $especificacao->id, 'id' => $item->id]) }}">
                                                                {!! optional($item->amostrasIdiomas->first())->nome !!}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @else
                                                    <p>Nenhuma amostra foi encontrada!</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(count($amostrasEspecificacoes) > 0)
                                <div class="table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>Nome</h6>
                                                </th>
                                                <th class="th-info text-end">
                                                    <h6></h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($amostrasEspecificacoes as $nomeAmostra => $itens)
                                                @foreach($itens as $key => $item)
                                                @if($item->amostra)
                                                <tr data-href="{{route('Especificacoes.editar_amostra', ['id' => $item->id])}}">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                                    {!! optional($item->amostra->amostrasIdiomas->first())->nome !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div style="position: relative">
                                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                                <i class="lni lni-more-alt"></i>
                                                            </button>
                                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                                                <ul class="modal-options">
                                                                    <li class="dropdown-item">
                                                                        <a href="{{ route('Especificacoes.editar_amostra', ['id' => $item->id]) }}" class="link-modal">
                                                                            <i class="bi bi-pencil"></i> Editar
                                                                        </a>
                                                                    </li>
                                                                    <li class="dropdown-item">
                                                                        <form class="responseAjax" action="{{route('Especificacoes.excluir_amostra', ['id' => $item->id])}}" method="post">
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
                                                @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p>Nenhuma amostra foi encontrada!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseProdutos" aria-expanded="false" aria-controls="collapseProdutos">
                                Produtos
                            </button>
                        </h2>
                        <div id="collapseProdutos" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                    @if(count($maquinaProdutos) > 0)
                                    <div class="card-toolbar d-flex justify-content-center justify-content-md-end">
                                        <button class="btn btn-primary justify-content-center justify-content-md-end dropdown-modal" id="modalOpenProdutos">Adicionar produtos</button>
                                        
                                        <div class="hidden modal-options-menu" data-modal="modalOpenProdutos">
                                            <ul class="modal-options" style="margin-top: 30px;">
                                                @if(count($maquinaProdutos) > 0)
                                                    @foreach($maquinaProdutos as $item)
                                                        <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                                            <a class="link-modal" 
                                                            href="{{ route('Especificacoes.criar_produto', ['especificacaoId' => $especificacao->id, 'id' => $item->id]) }}">
                                                                {!! optional($item->produtosIdiomas->first())->nome !!}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @else
                                                    <p>Nenhuma produto foi encontrado!</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(count($produtosEspecificacoes) > 0)
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>Nome</h6>
                                                </th>
                                                <th class="th-info text-end">
                                                    <h6></h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produtosEspecificacoes as $nomeProduto => $itens)
                                                @foreach($itens as $key => $item)
                                                @if($item->produto)
                                                <tr data-href="{{route('Especificacoes.editar_produto', ['id' => $item->id])}}">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                                    {!! optional($item->produto->produtosIdiomas->first())->nome !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div style="position: relative">
                                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                                <i class="lni lni-more-alt"></i>
                                                            </button>
                                                            <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                                                <ul class="modal-options">
                                                                    <li class="dropdown-item">
                                                                        <a href="{{ route('Especificacoes.editar_produto', ['id' => $item->id]) }}" class="link-modal">
                                                                            <i class="bi bi-pencil"></i> Editar
                                                                        </a>
                                                                    </li>
                                                                    <li class="dropdown-item">
                                                                        <form class="responseAjax" action="{{route('Especificacoes.excluir_produto', ['id' => $item->id])}}" method="post">
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
                                                @endif
                                                @endforeach
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p>Nenhum produto foi encontrado!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseEspecsAmostras" aria-expanded="false" aria-controls="collapseEspecsAmostras">
                                Especs. de amostras
                            </button>
                        </h2>
                        <div id="collapseEspecsAmostras" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>ID + Amostra</h6>
                                                </th>
                                                <th>
                                                    <h6></h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($amostrasPedido) > 0)
                                            @foreach($amostrasPedido as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input form-check-input-amostras" type="checkbox" value="{{ $item->id }}" {{in_array($item->id, $especificacaoAmostrasPedido) ? 'checked' : ''}} name="amostra_pedido_id">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6" onclick="getAmostra(this, {{ $item->id }})" data-bs-toggle="modal" data-bs-target="#modalAmostra--{{$item->id}}" data-open="false">
                                                                    {!! $item->id !!}) {{optional($item->amostra->amostrasIdiomas->first())->nome }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                          
                                                        <div class="modal fade" id="modalAmostra--{{$item->id}}" role="dialog">
                                                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                                <div class="modal-content accordion">
                                                                    <div class="modal-header">
                                                                        <div>
                                                                            <h5 class="modal-title align-self-center" id="modalAmostra--{{$item->id}}">
                                                                                {{$item->id}}) {{optional($item->amostra->amostrasIdiomas->first())->nome }}
                                                                            </h5>
                                                                        </div>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 mb-5 fv-row">
                                                                                <div id="spinnerModal--{{$item->id}}" class="text-center py-5 hidden">
                                                                                    <div class="spinner-border text-primary"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                    </div>
                                                    <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                                        <ul class="modal-options">
                                                            <li class="dropdown-item">
                                                               <a class="link-modal" href="{{route('PedidosAmostras.copiar', ['id' => $item->id])}}"> <i class="bi bi-copy"></i> Copiar
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a class="link-modal" href="{{route('PedidosAmostras.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <form class="responseAjax" action="{{route('PedidosAmostras.excluir', ['id' => $item->id])}}" method="post">
                                                                    @csrf
                                                                    <button class="deleteBt text-danger" type="submit">
                                                                        <i class="bi bi-trash"></i> Excluir
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
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
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapseEspecsProdutos" aria-expanded="false" aria-controls="collapseEspecsProdutos">
                                Especs. de produtos
                            </button>
                        </h2>
                        <div id="collapseEspecsProdutos" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>ID + Produto</h6>
                                                </th>
                                                <th class="">
                                                    <h6></h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($produtosPedido) > 0)
                                            @foreach($produtosPedido as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input form-check-input-produtos" type="checkbox" value="{{ $item->id }}" {{in_array($item->id, $especificacaoProdutosPedido) ? 'checked' : ''}} name="produto_pedido_id">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                 <span class="text-gray-800 text-hover-primary mb-1 fs-6" onclick="getProduto(this, {{ $item->id }})" data-bs-toggle="modal" data-bs-target="#modalProduto--{{$item->id}}" data-open="false">
                                                                    {!! $item->id !!}) {{optional($item->produto->produtosIdiomas->first())->nome }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="modalProduto--{{$item->id}}" role="dialog">
                                                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                                <div class="modal-content accordion">
                                                                    <div class="modal-header">
                                                                        <div>
                                                                            <h5 class="modal-title align-self-center" id="modalProduto--{{$item->id}}">
                                                                                {{$item->id}}) {{optional($item->produto->produtosIdiomas->first())->nome }}
                                                                            </h5>
                                                                        </div>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 mb-5 fv-row">
                                                                                <div id="spinnerModal--{{$item->id}}" class="text-center py-5 hidden">
                                                                                    <div class="spinner-border text-primary"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                    </div>
                                                    <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                                        <ul class="modal-options">
                                                            <li class="dropdown-item">
                                                               <a class="link-modal" href="{{route('PedidosProdutos.copiar', ['id' => $item->id])}}"> <i class="bi bi-copy"></i> Copiar
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a class="link-modal" href="{{route('PedidosProdutos.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <form class="responseAjax" action="{{route('PedidosProdutos.excluir', ['id' => $item->id])}}" method="post">
                                                                    @csrf
                                                                    <button class="deleteBt text-danger" type="submit">
                                                                        <i class="bi bi-trash"></i> Excluir
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
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
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="accordion">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" style="font-weight: bold" data-bs-toggle="collapse" data-bs-target="#collapsePedido" aria-expanded="false" aria-controls="collapsePedido">
                                Pedido
                            </button>
                        </h2>
                        <div id="collapsePedido" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="th-info">
                                                    <h6>Id</h6>
                                                </th>
                                                <th class="th-info">
                                                    <h6>N° pedido</h6>
                                                </th>
                                                <th class="th-info">
                                                    <h6>Cliente</h6>
                                                </th>
                                                <th class="">
                                                    <h6></h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($especificacao->pedido))
                                            <tr data-href="{{route('Pedidos.editar', ['id' => $especificacao->pedido->id])}}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                                {!! $especificacao->pedido->id !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                                {!! $especificacao->pedido->nome !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip"
                                                            data-bs-title="{!! $especificacao->pedido->cliente->nome !!}"
                                                            class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 250px">
                                                                {!! $especificacao->pedido->cliente->nome !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$especificacao->pedido->id}}">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$especificacao->pedido->id}}">
                                                            <ul class="modal-options">
                                                                <li class="dropdown-item">
                                                                    <a class="link-modal" href="{{route('Pedidos.editar', ['id' => $especificacao->pedido->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-item">
                                                                    <form class="responseAjax" action="{{route('Pedidos.excluir', ['id' => $especificacao->pedido->id])}}" method="post">
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
        </div>
    </div>
</section>
<section class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 d-flex justify-content-end">
                <form class="responseAjax" action="{{route('Especificacoes.excluir', ['id' => $especificacao->id])}}" method="post">
                    @csrf
                    <button class="deleteBt text-white btn btn-sm btn-primary" type="submit">
                        <i class="bi bi-trash"></i> Excluir especificação
                    </button>
                </form>
            </div>
        </div>    
    </div>
</section>
@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/moment.js') }}"></script>
<script src="{{ mixAssets('/assets/js/fullcalendar.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>

$(document).ready(function() {

    $('select.selectRv').on('change', function() {
        
        if (!this.value) {
            const original = $(this).data('original');
            $(this).val(original).trigger('change.select2');
            return;
        }
        
        $.ajax({
            url: `/especificacoes/revisao`,
            method: 'post',
            data: {
                especificacao_id: @json($especificacao->id),
                revisao_id: $(this).val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = `/especificacao/${@json($especificacao->id)}`;
            }
        });
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-dialog").length)
        e.stopImmediatePropagation();
    });
    
    $('.modal').on('shown.bs.modal', function() {
        $(document).off('focusin.modal');
    })
    $('.modal').on('hide.bs.modal', function() {
        $(".tox-toolbar__overflow").hide();
    })

    const hash = window.location.hash;
    if (hash) {
        const activeTab = document.querySelector(`.nav-link[href="${hash}"]`);
        if (activeTab) {
        const tab = new bootstrap.Tab(activeTab);
        tab.show();
        }
    }else{
        $('.nav-active a').addClass('active');
    }

    setTimeout(function() {
    $('.fakeLoading').css('display', 'none');
        $('.tab-pane .card').css('visibility', 'visible').css('height', 'auto');
    }, 700);

    const tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
        const newHash = this.getAttribute('href');
        history.pushState(null, null, newHash);
        });
    });

    var table; 

    function initDataTable() {
        
        if ($.fn.DataTable.isDataTable('#tabelaAmostras')) {
            table.destroy();
        }

        table = $('#tabelaAmostras').DataTable({
            order: [[3, 'desc']],
            "columnDefs": [
                {
                    "targets": 3, // Coluna de porcentagem
                    "render": function(data, type, row) {
                        if (type === 'sort' || type === 'type') {
                            return parseFloat(data.replace('%', '').trim());
                        }
                        return data;
                    }
                }
            ],
            "language": {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Nenhum dado disponível na tabela",
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros totais)",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sSearch": "Buscar:",
                "sZeroRecords": "Nenhum registro encontrado",
                // "oPaginate": {
                //     "sFirst": "Primeiro",
                //     "sLast": "Último",
                //     "sNext": "Próximo",
                //     "sPrevious": "Anterior"
                // },
                "oAria": {
                    "sSortAscending": ": ativar para ordenar a coluna em ordem crescente",
                    "sSortDescending": ": ativar para ordenar a coluna em ordem decrescente"
                }
            },
            paging: false,
            responsive: true,
            // pageLength: 30
        });
    }

    $('#collapseSimilares').on('show.bs.collapse', function (e) {
        initDataTable();
    });

    initDataTable();
    
    $(window).scrollTop(0);

    window.getComparacao = function(el, especificacaoId) {
        const $el = $(el);
        $("#spinnerModal--" + especificacaoId + "").removeClass("hidden");
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'pt';
        if ($el.data('open') === false) {
            $.ajax({
                url: `/especificacoes/comparar/${especificacaoId}`,
                method: 'GET',
                data: {
                    especificacaoBaseId: @json($especificacao->id),
                    idioma: lang 
                },
                success: function(response) {
                    $("#spinnerModal--" + especificacaoId + "").addClass("hidden");
                    
                    $el.data('open', true);

                    const container = $(`#modalComparacao--${especificacaoId} .modal-body`);

                    const iguaisHtml = `
                        <h5 class="mb-2">Características Iguais</h5>
                        <ul class="list-group resumoContent">
                            ${response.iguais.map(i => `<li style="margin-left:0px; color: #000;" class="p-3 bg-light rounded-2 border border-light position-relative">${i}</li>`).join('')}
                        </ul>
                    `;

                    let diferentesHtml = '';

                    if (response.diferentes.comparado.length > 0 || response.diferentes.base.length > 0) {
                        diferentesHtml += `
                            <h5 class="mt-4 mb-4">Características Diferentes</h5>
                            <div class="row">
                        `;

                        if (response.diferentes.comparado.length > 0) {
                            diferentesHtml += `
                                <div class="col">
                                    <h6 class="mb-2">Especificação ${especificacaoId}</h6>
                                    <ul class="list-group resumoContent">
                                        ${response.diferentes.comparado.map(i => `<li style="margin-left:0px; color: #000;" class="p-3 bg-light rounded-2 border border-light position-relative">${i}</li>`).join('')}
                                    </ul>
                                </div>
                            `;
                        }

                        if (response.diferentes.base.length > 0) {
                            diferentesHtml += `
                                <div class="col">
                                    <h6 class="mb-2">Especificação ${@json($especificacao->id)}</h6>
                                    <ul class="list-group resumoContent">
                                        ${response.diferentes.base.map(i => `<li style="margin-left:0px; color: #000;" class="p-3 bg-light rounded-2 border border-light position-relative">${i}</li>`).join('')}
                                    </ul>
                                </div>
                            `;
                        }

                        diferentesHtml += `</div>`;
                    }

                    container.html(iguaisHtml + diferentesHtml);
                },

                error: function(err) {
                $("#spinnerModal--" + especificacaoId + "").addClass("hidden");
                    console.error('Erro ao buscar comparação:', err);
                }
            });
        }
    }

    window.getRevisao = function(el, revisaoId) {
        const $el = $(el);
        // $("#spinnerModalRevisao--" + revisaoId).removeClass("hidden");

        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'pt';

        if ($el.data('open') === false) {
            $.ajax({
                url: `/especificacoes/revisao/${revisaoId}`,
                method: 'GET',
                data: {
                    revisao_id: revisaoId,
                    lang: lang
                },
                success: function (response) {
                    $("#spinnerModalRevisao--" + revisaoId).addClass("hidden");
                    $el.data('open', true);
                    $("#modalRevisaoContent--" + revisaoId).html(response.rev);
                },
                error: function () {
                    $("#spinnerModalRevisao--" + revisaoId).addClass("hidden");
                    $("#modalRevisaoContent--" + revisaoId).html('<div class="alert alert-danger">Erro inesperado</div>');
                }
            });
        }
    };

    function agruparMultiplos(atributos) {
        const map = new Map();

        atributos.forEach(attr => {

            if (attr.atributo_tipo !== 'multiplos') {
                map.set(Symbol(), attr);
                return;
            }

            if (!map.has(attr.atributo_id)) {
                map.set(attr.atributo_id, {
                    atributo_id: attr.atributo_id,
                    atributo_nome: attr.atributo_nome,
                    atributo_tipo: attr.atributo_tipo,
                    imagens: attr.imagens || [],
                    subatributos: []
                });
            }

            map.get(attr.atributo_id).subatributos.push({
                nome: attr.sub_atributo_nome,
                conteudo: attr.conteudo,
                observacao: attr.observacao_personalizada
            });
        });

        return Array.from(map.values());
    }
    
    function getContentModal(itemPedidoId, response, idName, tipo) {
        const container = $(`#${idName}--${itemPedidoId} .modal-body`);
        const urlBase = "{{ config('app.ftp_media_url') }}";
        let html = `<ul class="list-group">`;

        Object.entries(response).forEach(([nomeAmostra, pedidos]) => {
            pedidos.forEach(pedido => {
                Object.values(pedido).forEach(dados => {

                    const atributosAgrupados = agruparMultiplos(dados.atributos);

                    atributosAgrupados.forEach(attr => {

                        const type = attr.atributo_tipo;
                        const name = attr.atributo_nome;

                        /* ===============================
                        SELECIONÁVEL / TEXTO
                        =============================== */
                        if (type === 'selecionavel' || type === 'texto') {

                            let valor =
                                attr.conteudo ? `${attr.conteudo}${attr.atributo_unidade ? " " + attr.atributo_unidade : ''};` :
                                attr.sub_atributo_nome ? `${attr.sub_atributo_nome}${attr.atributo_unidade ? " " + attr.atributo_unidade : ''};` :
                                `<span style="color:#e2231a">Não informado;</span>`;

                            html += `
                                <li class="p-3 bg-light rounded-2 border border-light position-relative" style="margin-left: 0px;">
                                    <span style="font-weight:600">${name}:</span>
                                    ${valor}
                            `;

                            if (attr.observacao_personalizada) {
                                html += `<div class="obsText">Obs: ${attr.observacao_personalizada}</div>`;
                            }

                            if (attr.imagens?.length) {
                                html += `<div>`;
                                attr.imagens.forEach(img => {
                                    html += `<img src="${urlBase}${tipo}/pedido/${img.imagem}" class="layout" style="margin:10px 0;">`;
                                });
                                html += `</div>`;
                            }

                            html += `</li>`;
                        }

                        /* ===============================
                        MÚLTIPLOS (AGRUPADO)
                        =============================== */
                        if (type === 'multiplos') {

                            html += `
                                <li class="p-3 bg-light rounded-2 border border-light position-relative" style="margin-left: 0px;">
                                    <span style="font-weight:600;">${name}:</span>
                            `;

                            attr.subatributos.forEach((sub, i) => {
                                html += `
                                    <div class="">
                                        <span style="font-weight:600;">${sub.nome}:</span> ${sub.conteudo ?? '<span style="color:#e2231a">Não informado;</span>'};
                                `;

                                if (sub.observacao) {
                                    html += `<div class="obsText">Obs: ${sub.observacao}</div>`;
                                }

                                html += `</div>`;
                            });

                            if (attr.imagens?.length) {
                                html += `<div>`;
                                attr.imagens.forEach(img => {
                                    html += `<img src="${urlBase}/${tipo}/pedido/${img.arquivo}" class="layout" style="margin:10px 0;">`;
                                });
                                html += `</div>`;
                            }

                            html += `</li>`;
                        }
                    });

                    if(dados.imagens_gerais.length > 0) {

                        html += 
                            `<div class="d-flex flex-wrap flex-sm-nowrap mt-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6>Imagens</h6>
                                    </div>
                                    <div class="row galleryPedidoModal" id="contentSortableProjects">
                        `;
                        
                        dados.imagens_gerais.forEach((attr, index) => {
                            const imgUrl = `${urlBase}/${tipo}/pedido/${attr.arquivo}`;
                            html += `
                                <div class="col-md-4 mb-3 projectContent">
                                    <div class="card-style">
                                        <div class="card-body d-flex flex-center flex-column">

                                            <a
                                                href="${imgUrl}"
                                                class="light-item"
                                                data-sub-html="Imagem ${index + 1}">
                                                <img
                                                    class="imgProject img-fluid"
                                                    src="${imgUrl}" />
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                        html += `
                            </div>
                            </div>
                            </div>
                        `;
                    }
                    
                    if(dados.documentos_gerais.length > 0) {
                        html += 
                        `
                            <div class="table-wrapper table-responsive">
                                <table class="table striped-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Arquivo(s)</h6>
                                            </th>
                                        </tr>
                                    </thead>
                        `;

                        dados.documentos_gerais.forEach((attr, index) => {
                            const imgUrl = `${urlBase}/${tipo}/pedido/${attr.arquivo}`;
                            html += `
                                <tbody style="padding: 15px !important;">
                                    <tr>
                                        <td>
                                            <a target="_blank" href="${imgUrl}">
                                            ${attr.arquivo}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            `;
                        });
                        
                        html += `</table></div>`;
                    }
                    
                });
            });

        });

        html += `</ul>`;
        container.html(html);
    }

    window.getAmostra = function(el, amostraPedidoId) {
        const $el = $(el);
        $("#spinnerModal--" + amostraPedidoId + "").removeClass("hidden");
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'pt';

        if ($el.data('open') === false) {
            $.ajax({
                url: `/especificacoes/amostra/pedido/${amostraPedidoId}`,
                method: 'GET',
                data: {
                    atributo_amostra_indice_pedido_id: amostraPedidoId,
                    lang: lang 
                },
                success: function (response) {
                    $("#spinnerModal--" + amostraPedidoId).addClass("hidden");
                    //mudar data-open
                    $el.data('open', true);
                    getContentModal(amostraPedidoId, response.amostra, 'modalAmostra', 'amostras');

                    let modalAbertoId = null;

                    document.addEventListener('shown.bs.modal', function(event) {
                        const modal = event.target;
                        modalAbertoId = modal.id;

                        const galleriesModal = modal.querySelectorAll('.galleryPedidoModal');

                        galleriesModal.forEach(gallery => {
                            if (!gallery.dataset.lgInit) {
                                lightGallery(gallery, {
                                    selector: 'a.light-item',
                                    plugins: [lgZoom, lgThumbnail],
                                    speed: 400,
                                    download: false,
                                });

                                gallery.dataset.lgInit = "true";
                            }
                        });
                    });
                },

                error: function(err) {
                $("#spinnerModal--" + amostraPedidoId + "").addClass("hidden");
                    console.error('Erro ao buscar amostras:', err);
                }
            });
        }
       
    }

    window.getProduto = function(el, produtoPedidoId) {
        const $el = $(el);
        $("#spinnerModal--" + produtoPedidoId + "").removeClass("hidden");
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'pt';
        
        if ($el.data('open') === false) {
            $.ajax({
                url: `/especificacoes/produto/pedido/${produtoPedidoId}`,
                method: 'GET',
                data: {
                    atributo_produto_indice_pedido_id: produtoPedidoId,
                    lang: lang 
                },
                success: function (response) {
                    $("#spinnerModal--" + produtoPedidoId).addClass("hidden");

                    $el.data('open', true);
                    
                    getContentModal(produtoPedidoId, response.produto, 'modalProduto', 'produtos');

                    let modalAbertoId = null;

                    document.addEventListener('shown.bs.modal', function(event) {
                        const modal = event.target;
                        modalAbertoId = modal.id;

                        const galleriesModal = modal.querySelectorAll('.galleryPedidoModal');

                        galleriesModal.forEach(gallery => {
                            if (!gallery.dataset.lgInit) {
                                lightGallery(gallery, {
                                    selector: 'a.light-item',
                                    plugins: [lgZoom, lgThumbnail],
                                    speed: 400,
                                    download: false,
                                });

                                gallery.dataset.lgInit = "true";
                            }
                        });
                    });
                },

                error: function(err) {
                $("#spinnerModal--" + produtoPedidoId + "").addClass("hidden");
                    console.error('Erro ao buscar produtos:', err);
                }
            });
        }
    }

    window.exportarParaWord = function(modalId, especificacaoId, serie = null) {
        let container = document.querySelector(`#${modalId} .modal-body`);
        if (!container) return;
        let condigo = '';
        let titulo = `<h2>Especificação ${especificacaoId}</h2>`;
        if (serie) {
            condigo = `<p>Serie: ${serie}</p>`;
        }
        let header = `
        <html xmlns:o='urn:schemas-microsoft-com:office:office'
              xmlns:w='urn:schemas-microsoft-com:office:word'
              xmlns='http://www.w3.org/TR/REC-html40'>
            <head>
                <meta charset='utf-8'>
                <title>Exportar para Word</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    h2 {
                        margin-bottom: 20px;
                    }
                    li {
                        margin: 10px 0;
                    }
                </style>
            </head>
            <body>
    `;
        let footer = "</body></html>";
        let content = header + titulo + condigo + container.innerHTML + footer;

        let blob = new Blob(['\ufeff', content], {
            type: 'application/msword'
        });

        let link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `especificacao-${especificacaoId}.doc`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    $('.form-check-input-amostras').on('change', function() {
        let valor = $(this).val();
        let checked = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/especificacoes/amostra/pedido',
            type: 'POST',
            data: {
                atributo_amostra_indice_pedido_id: valor,
                checked: checked,
                especificacao_id: @json($especificacao->id),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr) {
                console.error('Erro ao atualizar:', xhr.responseText);
            }
        });
    });

    $('.form-check-input-produtos').on('change', function() {
        let valor = $(this).val();
        let checked = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/especificacoes/produto/pedido',
            type: 'POST',
            data: {
                atributo_produto_indice_pedido_id: valor,
                checked: checked,
                especificacao_id: @json($especificacao->id),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr) {
                console.error('Erro ao atualizar:', xhr.responseText);
            }
        });
    });
    });

    var chart = echarts.init(document.getElementById('donutEspecificacao'));
    let = porcentagem = @json($porcentagemResumo) || 0;
    let = restante = 100 - porcentagem
    
    chart.setOption({
        tooltip: {
            trigger: 'item'
        },
        title: {
            text: porcentagem + '%',
            left: 'center',
            top: '42%',
            textStyle: {
                fontSize: 28,
                fontWeight: 'bold'
            }
        },
        series: [
            {
                type: 'pie',
                radius: ['60%', '75%'],
                avoidLabelOverlap: true,
                label: { show: true },
                labelLine: { show: true },
                data: [
                    { value: porcentagem, name: 'Concluído' },
                    { value: restante.toFixed(1), name: 'Restante' }
                ],
                color: ['#60d66a', '#E0E0E0']
            }
        ]
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
            new bootstrap.Tooltip(el, {
                html: true
            })
        })
    })

</script>
@endsection