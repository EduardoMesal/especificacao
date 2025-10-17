@extends('layouts.admin')
@section('title', 'Especificação ' . $especificacao->id)
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="card ">
            <div class="card-body">
                <div class="flex-grow-1">
                    <div class="justify-content-between align-items-start flex-wrap mb-2">
                        <div class="card-toolbar cardBg p-8 d-flex justify-content-between">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xl-2 mt-5">
                                        <div>
                                            <h5>Código Focco</h5>
                                            @if($especificacao->codigo_focco)
                                            {!! $especificacao->codigo_focco !!}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mt-5">
                                        <div>
                                            <h5>Status</h5>
                                            @if($especificacao->status)
                                            {!! $especificacao->status !!}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mt-5">
                                        <div>
                                            <h5>Cliente</h5>
                                            @if($especificacao->pedido->cliente)
                                            {!! $especificacao->pedido->cliente->nome !!}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mt-5">
                                        <div>
                                            <h5>Série</h5>
                                            @if($especificacao->serie)
                                            {!! $especificacao->serie !!}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mt-5">
                                        <div>
                                            <h5>Máquina</h5>
                                            @if($especificacao->maquina)
                                            {{ optional($especificacao->maquina->maquinasIdiomas->first())->nome }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mt-5">
                                        <h5>Criado</h5>
                                        <p>
                                        @if($especificacao->criado)
                                            {{ \Carbon\Carbon::parse($especificacao->criado)->format('d/m/Y H:i') }}
                                        @else
                                            -
                                        @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-5">
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
                        <div class="card-toolbar mt-5">
                            <div class="">
                                <div class="custom-tab tab-profile">
                                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                        <li class="nav-item mt-5 nav-active">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#resumo" role="tab">Resumo</a>
                                        </li>
                                        <li class="nav-item mt-5">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#historico" role="tab">Históricos</a>
                                        </li>
                                        <li class="nav-item mt-5">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" id="tabSimilares" href="#similares" role="tab">Similares</a>
                                        </li>
                                        <li class="nav-item mt-5">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#amostras" role="tab">Amostras</a>
                                        </li>
                                        <li class="nav-item mt-5">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#produtos" role="tab">Produtos</a>
                                        </li>
                                        <li class="nav-item mt-5">
                                            <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#pedido" role="tab">Pedido</a>
                                        </li>
                                    </ul>
                                    <div class="fakeLoading">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                    </div>
                                    <div class="tab-content pt-4">
                                        <div class="tab-pane active mb-8" id="resumo" role="tabpanel">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-body adjustCardBody">
                                                        <div class="col-lg-12 single-schedules-inner">
                                                            <div class="d-flex gap-2 justify-content-center justify-content-md-end mb-8 buttonAccordion">
                                                                <a href="{{ route('Especificacoes.editar', ['id' => $especificacao->id]) }}" class="btn btn-sm btn-primary">
                                                                <i class="bi bi-pencil-fill"></i> Editar especificação
                                                                </a>
                                                                <div class="card-toolbar">
                                                                    <button class="btn btn-sm btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                                    <i class="bi bi-file-earmark-word-fill"></i> Exportar Word
                                                                    </button>
                                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                                        <div class="separator mb-3 opacity-75"></div>
                                                                        <div class="menu-item px-3 mb-3">
                                                                            <a class="menu-link px-3" 
                                                                                href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'tipo' => 'especificacao']) }}">
                                                                                Especificações
                                                                            </a>
                                                                            <a class="menu-link px-3" 
                                                                                href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'tipo' => 'amostras']) }}">
                                                                                Amostras
                                                                            </a>
                                                                            <a class="menu-link px-3" 
                                                                                href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'tipo' => 'produtos']) }}">
                                                                                Produtos
                                                                            </a>
                                                                            <a class="menu-link px-3" 
                                                                                href="{{ route('Especificacoes.word', ['id' => $especificacao->id, 'tipo' => 'completa']) }}">
                                                                                Completa
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion" id="accordionEspecificacoes">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingEspecificacoes">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEspecificacoes" aria-expanded="true" aria-controls="collapseEspecificacoes">
                                                                        Resumo das especificações
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseEspecificacoes" class="accordion-collapse collapse show" aria-labelledby="headingEspecificacoes">
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

                                                                                                <li class="list-group-item">
                                                                                                    <div>{!! $resumo['caracteristica'] !!}:</div>
                                                                                                    @foreach($multiplosAgrupados[$resumo['caracteristica']] as $item)
                                                                                                        <div>
                                                                                                            {{ $item['atributo'] }}: 
                                                                                                            @if($item['conteudo'])
                                                                                                            {{ $item['conteudo'] }}{{ $item['unidade'] ? ' ' . $item['unidade'] : '' }};
                                                                                                            @else
                                                                                                                <span>Não informado;</span>
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
                                                                                            <li class="list-group-item {{ $resumo['excluido'] ? 'disabledList' : ''}}">
                                                                                                @if($resumo['comparavel'])
                                                                                                    <div class="isComparavel" 
                                                                                                        data-bs-toggle="tooltip" 
                                                                                                        data-bs-placement="top"
                                                                                                        data-bs-custom-class="custom-tooltip"
                                                                                                        data-bs-title="Este item é comparável.">
                                                                                                        <i class="bi bi-bookmark-fill"></i>
                                                                                                    </div>
                                                                                                @endif

                                                                                                <div>
                                                                                                    {!! $resumo['caracteristica'] !!}:
                                                                                                    @if($resumo['tipo'] === 'selecionavel' && $resumo['atributo'])
                                                                                                        {{ $resumo['atributo'] }}{{ $resumo['atributo'] != 'PERSONALIZADO' ? ($resumo['unidade'] ? ' ' . $resumo['unidade'] : '') : '' }};
                                                                                                    @elseif($resumo['tipo'] === 'texto' && $resumo['conteudo'])
                                                                                                        {{ $resumo['conteudo'] }}{{ $resumo['unidade'] ? ' ' . $resumo['unidade'] : '' }};
                                                                                                    @else
                                                                                                        <span>Não informado;</span>
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
                                                                                                        <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                                                                            <i class="bi bi-trash-fill"></i>Excluir
                                                                                                        </button>
                                                                                                    </form>
                                                                                                @endif
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <li class="list-group-item">Nenhuma especificação foi encontrada.</li>
                                                                                @endif
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingAmostras">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmostras" aria-expanded="false" aria-controls="collapseAmostras">
                                                                        Resumo das amostras
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseAmostras" class="accordion-collapse collapse" aria-labelledby="headingAmostras">
                                                                        <div class="accordion-body">
                                                                            <div class="resumoContent">
                                                                            @if (count($dadosPorAmostra) > 0)
                                                                                @foreach ($dadosPorAmostra as $indice => $atributos)
                                                                                    @if (count($atributos) > 0)
                                                                                        <h4>{{ $atributos[0]['amostra_nome'] }} {{ $loop->iteration }}</h4>

                                                                                        @php
                                                                                            $amostraIndiceId = $atributos[0]['indice_amostra_id'] ?? null;
                                                                                            $temImagem = \App\Models\ImagemAmostra::where('amostra_indice_id', $amostraIndiceId)->exists();
                                                                                        @endphp

                                                                                        @if ($temImagem)
                                                                                            @php
                                                                                                $imagens = \App\Models\ImagemAmostra::where('amostra_indice_id', $amostraIndiceId)->get();
                                                                                            @endphp
                                                                                            @if(count($imagens) > 0)
                                                                                            <div class="contentResumoImg">
                                                                                                @foreach ($imagens as $img)
                                                                                                    <img src="{{ mixAssets('assets/img/amostras/' . $img->imagem) }}" alt="Imagem da amostra">
                                                                                                @endforeach
                                                                                            </div>
                                                                                            @endif
                                                                                        @endif

                                                                                        @php
                                                                                            $agrupados = collect($atributos)->groupBy('atributo_id');
                                                                                        @endphp

                                                                                        <ul class="list-group">
                                                                                            @foreach ($agrupados as $grupo)
                                                                                                @php $primeiro = $grupo->first(); @endphp
                                                                                                @if (strtolower($primeiro['sub_atributo_nome']) !== 'n/a')
                                                                                                    @if ($primeiro['atributo_tipo'] === 'multiplos')
                                                                                                        <li class="list-group-item">
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
                                                                                                                        {{ $item['sub_atributo_nome'] }}:
                                                                                                                        @if($item['conteudo'])
                                                                                                                            {{ $item['conteudo'] }}{{ $item['atributo_unidade'] ? ' ' . $item['atributo_unidade'] : '' }};
                                                                                                                        @else
                                                                                                                            <span>Não informado;</span>
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
                                                                                                            <li class="list-group-item">
                                                                                                                {{ $item['atributo_nome'] }}:
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
                                                                                                                        $valor = '<span>Não informado;</span>';
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
                                                                                        </ul>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <li class="list-group-item">Nenhuma amostra foi encontrada.</li>
                                                                            @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingProdutos">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProdutos" aria-expanded="false" aria-controls="collapseProdutos">
                                                                        Resumo dos produtos
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseProdutos" class="accordion-collapse collapse" aria-labelledby="headingProdutos">
                                                                        <div class="accordion-body">
                                                                            <div class="resumoContent">
                                                                            @if (count($dadosPorProduto) > 0)
                                                                                @foreach ($dadosPorProduto as $indice => $atributos)
                                                                                    @if (count($atributos) > 0)
                                                                                        <h4>{{ $atributos[0]['produto_nome'] }} {{ $loop->iteration }}</h4>

                                                                                        @php
                                                                                            $produtoIndiceId = $atributos[0]['indice_produto_id'] ?? null;
                                                                                            $temImagem = \App\Models\ImagemProduto::where('produto_indice_id', $produtoIndiceId)->exists();
                                                                                        @endphp

                                                                                        @if ($temImagem)
                                                                                            @php
                                                                                                $imagens = \App\Models\ImagemProduto::where('produto_indice_id', $produtoIndiceId)->get();
                                                                                            @endphp
                                                                                            @if(count($imagens) > 0)
                                                                                            <div class="contentResumoImg">
                                                                                                @foreach ($imagens as $img)
                                                                                                    <img src="{{ mixAssets('assets/img/produtos/' . $img->imagem) }}" alt="Imagem do produto">
                                                                                                @endforeach
                                                                                            </div>
                                                                                            @endif
                                                                                        @endif

                                                                                        @php
                                                                                            $agrupados = collect($atributos)->groupBy('atributo_produto_id');
                                                                                        @endphp

                                                                                        <ul class="list-group">
                                                                                            @foreach ($agrupados as $grupo)
                                                                                                @php $primeiro = $grupo->first(); @endphp
                                                                                                @if (strtolower($primeiro['sub_atributo_nome']) !== 'n/a')

                                                                                                    @if ($primeiro['atributo_tipo'] === 'multiplos')
                                                                                                        <li class="list-group-item">
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
                                                                                                                        {{ $item['sub_atributo_nome'] }}:
                                                                                                                        @if($item['conteudo'])
                                                                                                                            {{ $item['conteudo'] }}{{ $item['atributo_unidade'] ? ' ' . $item['atributo_unidade'] : '' }};
                                                                                                                        @else
                                                                                                                            <span>Não informado;</span>
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
                                                                                                            <li class="list-group-item">
                                                                                                                {{ $item['atributo_nome'] }}:
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
                                                                                                                        $valor = '<span>Não informado;</span>';
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
                                                                                        </ul>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <li class="list-group-item">Nenhum produto foi encontrado.</li>
                                                                            @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingObservacoes">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseObservacoes" aria-expanded="false" aria-controls="collapseObservacoes">
                                                                            Observações
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseObservacoes" class="accordion-collapse collapse" aria-labelledby="headingObservacoes">
                                                                        <div class="accordion-body">
                                                                            <div class="resumoContent">
                                                                                <ul class="list-group">
                                                                                @if (count($especificacao->observacoes) > 0)
                                                                                    @foreach ($especificacao->observacoes as $key => $observacao)
                                                                                        <li class="list-group-item"><strong>Observação {!! $key + 1 !!}:</strong> {!! $observacao->conteudo !!}</li>
                                                                                    @endforeach
                                                                                @else
                                                                                    <li class="list-group-item">Nenhuma observação foi encontrada.</li>
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
                                        <div class="tab-pane mb-8" id="historico" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body adjustCardBody">
                                                            <div class="col-lg-12 single-schedules-inner">
                                                                <section class="">
                                                                    <div class="timeline block">
                                                                        @if(count($especificacao->historicos) > 0)
                                                                        @foreach($especificacao->historicos as $item)
                                                                        <div class="tl-item">
                                                                            <div class="tl-dot b-secondary"></div>
                                                                            <div class="tl-content">
                                                                                <div class="">
                                                                                    {!! $item->usuario->nome !!} alterou: {!! optional($item->caracteristica->caracteristicasIdiomas->first())->nome !!} <i class="bi bi-arrow-left-right"></i> @if($item->atributo) {!! optional($item->atributo->atributosIdiomas->first())->nome !!} @else Não informado @endif
                                                                                
                                                                                </div>
                                                                                <div class="tl-date text-muted mt-1">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->criado)->format('d/m/Y H:i'); }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                        @else
                                                                        <p>Nenhum histórico foi encontrado.</p>
                                                                        @endif
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane mb-8" id="similares" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body adjustCardBody">
                                                            <div class="col-lg-12 single-schedules-inner">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <h5>Máquinas com especificações similares</h5>
                                                                </div>
                                                                <table id="tabelaAmostras" class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Máquina</th>
                                                                            <th>Código Focco</th>
                                                                            <th>Status</th>
                                                                            <th>Similar (%)</th>
                                                                            <th>Comparação</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($listaComparacao as $amostra)
                                                                            <tr>
                                                                                <td>
                                                                                    <a href="{{ route('Especificacoes.especificacao', ['id' => $amostra['especificacao_id']]) }}">
                                                                                    {{$amostra['especificacao_id']}}) {{ $amostra['maquina'] }} - ({{$amostra['nomesAtributos']}})
                                                                                    </a>
                                                                                </td>
                                                                                <td>{{ $amostra['codigo_focco'] }}</td>
                                                                                <td>{{ $amostra['status'] }}</td>
                                                                                <td data-order="{{ $amostra['porcentagem_similaridade'] }}">{{ $amostra['porcentagem_similaridade'] }}%</td>
                                                                                <td>
                                                                                    <button class="btn btn-light" onclick="getComparacao({{ $amostra['especificacao_id'] }})" data-bs-toggle="modal" data-bs-target="#modalComparacao--{{$amostra['especificacao_id']}}">
                                                                                        Ver comparação
                                                                                    </button>    
                                                                                    <div class="modal fade modalHeight" id="modalComparacao--{{$amostra['especificacao_id']}}" role="dialog">
                                                                                        <div class="modal-dialog modal-xl d-flex align-items-center justify-content-center" role="document">
                                                                                            <div class="modal-content accordion">
                                                                                                <div class="modal-header">
                                                                                                    <div>
                                                                                                        <h5 class="modal-title align-self-center" id="modalComparacao--{{$amostra['especificacao_id']}}">
                                                                                                            Especificação {{$amostra['especificacao_id']}}
                                                                                                        </h5>
                                                                                                        @if(isset($amostra['codigo_focco']))
                                                                                                            <p>Código Focco: {{$amostra['codigo_focco']}}
                                                                                                        @endif
                                                                                                    </div>
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12 mb-8 fv-row">
                                                                                                            <div class="spinner-border hidden position-absolute top-50 start-50" id="spinnerModal--{{$amostra['especificacao_id']}}" style="margin-top: -1.5%;" role="status">
                                                                                                                <span class="sr-only">Loading...</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button class="btn btn-light"
                                                                                                        onclick="exportarParaWord('modalComparacao--{{$amostra['especificacao_id']}}', {{$amostra['especificacao_id']}}, '{{ $amostra['codigo_focco'] ?? '' }}')">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane mb-8" id="amostras" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body adjustCardBody tbodyAmostra">
                                                            <div class="col-lg-12 single-schedules-inner">
                                                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                                                    @if(count($maquinaAmostras) > 0)
                                                                    <div class="card-toolbar d-flex justify-content-center justify-content-md-end mb-8">
                                                                        <button class="btn btn-primary justify-content-center justify-content-md-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">Adicionar amostras</button>
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px pb-3" data-kt-menu="true">
                                                                            <div class="separator mb-3 opacity-75"></div>
                                                                            @if(count($maquinaAmostras) > 0)
                                                                                @foreach($maquinaAmostras as $item)
                                                                                    <div class="menu-item px-3">
                                                                                        <a class="menu-link px-3" 
                                                                                        href="{{ route('Especificacoes.criar_amostra', ['especificacaoId' => $especificacao->id, 'id' => $item->id]) }}">
                                                                                            {!! optional($item->amostrasIdiomas->first())->nome !!}
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                <p>Nenhuma amostra foi encontrada!</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                                        <thead>
                                                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                                                <th class="p-0 min-w-100px"></th>
                                                                                <th class="p-0 w-100px"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if(count($amostrasEspecificacoes) > 0)
                                                                                @foreach($amostrasEspecificacoes as $nomeAmostra => $itens)
                                                                                    @foreach($itens as $key => $item)
                                                                                    @if($item->amostra)
                                                                                    <tr class="adjustLineTr">
                                                                                        <td>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="d-flex justify-content-start flex-column">
                                                                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                                                                        {!! optional($item->amostra->amostrasIdiomas->first())->nome !!} {{ ($key + 1) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                                                        </td>
                                                                                        <td class="text-end">
                                                                                            <div class="adjustBtnsUser gap-5">
                                                                                                <a href="{{ route('Especificacoes.editar_amostra', ['id' => $item->id]) }}" class="btn btn-sm btn btn-primary">
                                                                                                    <i class="bi bi-pencil-fill"></i> Editar
                                                                                                </a>
                                                                                                <form class="responseAjax" action="{{ route('Especificacoes.excluir_amostra', ['id' => $item->id]) }}" method="post">
                                                                                                    @csrf
                                                                                                    <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                                                                        <i class="bi bi-trash-fill"></i>Excluir
                                                                                                    </button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @else
                                                                            <p>Nenhuma amostra foi encontrada!</p>
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
                                        <div class="tab-pane mb-8" id="produtos" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body adjustCardBody tbodyAmostra">
                                                            <div class="col-lg-12 single-schedules-inner">
                                                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                                                    @if(count($maquinaProdutos) > 0)
                                                                    <div class="card-toolbar d-flex justify-content-center justify-content-md-end mb-8">
                                                                        <button class="btn btn-primary justify-content-center justify-content-md-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">Adicionar produtos</button>
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                                            <div class="separator mb-3 opacity-75"></div>
                                                                            @if(count($maquinaProdutos) > 0)
                                                                                @foreach($maquinaProdutos as $item)
                                                                                    <div class="menu-item px-3 mb-3">
                                                                                        <a class="menu-link px-3" 
                                                                                        href="{{ route('Especificacoes.criar_produto', ['especificacaoId' => $especificacao->id, 'id' => $item->id]) }}">
                                                                                            {!! optional($item->produtosIdiomas->first())->nome !!}
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                                @else
                                                                                <p>Nenhum produto foi encontrado!</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                                        <thead>
                                                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                                                <th class="p-0 min-w-100px"></th>
                                                                                <th class="p-0 w-100px"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if(count($produtosEspecificacoes) > 0)
                                                                                @foreach($produtosEspecificacoes as $nomeProduto => $itens)
                                                                                    @foreach($itens as $key => $item)
                                                                                    @if($item->produto)
                                                                                    <tr class="adjustLineTr">
                                                                                        <td>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="d-flex justify-content-start flex-column">
                                                                                                    <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                                                                        {!! optional($item->produto->produtosIdiomas->first())->nome !!} {{ ($key + 1) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                                                        </td>
                                                                                        <td class="text-end">
                                                                                            <div class="adjustBtnsUser gap-5">
                                                                                                <a href="{{ route('Especificacoes.editar_produto', ['id' => $item->id]) }}" class="btn btn-sm btn btn-primary">
                                                                                                    <i class="bi bi-pencil-fill"></i> Editar
                                                                                                </a>
                                                                                                <form class="responseAjax" action="{{ route('Especificacoes.excluir_produto', ['id' => $item->id]) }}" method="post">
                                                                                                    @csrf
                                                                                                    <button class="btn btn-sm btn-secondary deleteBt btn-secondary-delete" type="submit">
                                                                                                        <i class="bi bi-trash-fill"></i>Excluir
                                                                                                    </button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @else
                                                                            <p>Nenhum produto foi encontrado!</p>
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
                                         <div class="tab-pane mb-8" id="pedido" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body adjustCardBody tbodyAmostra">
                                                            <div class="col-lg-12 single-schedules-inner">
                                                                <div class="table-responsive">
                                                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                                        <thead>
                                                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                                                <th class="p-0 w-0px"></th>
                                                                                <th class="p-0 min-w-150px"></th>
                                                                                <th class="p-0 min-w-150px"></th>
                                                                                <th class="p-0 w-100px"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if(!empty($especificacao->pedido))
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="d-flex justify-content-start flex-column">
                                                                                                <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                                                                    {!! $especificacao->pedido->id !!}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="fw-semibold text-gray-400 d-block">Id</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="d-flex justify-content-start flex-column">
                                                                                                <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                                                                    {!! $especificacao->pedido->nome !!}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="fw-semibold text-gray-400 d-block">Nome</span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="d-flex justify-content-start flex-column">
                                                                                                <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                                                                    {!! $especificacao->pedido->cliente->nome !!}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="fw-semibold text-gray-400 d-block">Cliente</span>
                                                                                    </td>
                                                                                    <td class="text-end">
                                                                                        <div class="adjustBtnsUser gap-5">
                                                                                            <a href="{{route('Pedidos.editar', ['id' => $especificacao->pedido->id])}}" class="btn btn-sm btn btn-primary"><i class="bi bi-eye-fill"></i> Visualizar
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @else
                                                                            <p>Nenhum pedido foi encontrado!</p>
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
<script src="{{ mixAssets('/assets/js/moment.js') }}"></script>
<script src="{{ mixAssets('/assets/js/fullcalendar.js') }}"></script>
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {

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

        // Inicializar o DataTable
        table = $('#tabelaAmostras').DataTable({
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
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast": "Último",
                    "sNext": "Próximo",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": ativar para ordenar a coluna em ordem crescente",
                    "sSortDescending": ": ativar para ordenar a coluna em ordem decrescente"
                }
            },
            responsive: true,
            pageLength: 30
        });
    }

    $('#tabSimilares').on('shown.bs.tab', function (e) {
        initDataTable();
    });

    initDataTable();
    
    $(window).scrollTop(0);


    window.getComparacao = function(especificacaoId) {
        $("#spinnerModal--" + especificacaoId + "").removeClass("hidden");
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'pt';
        $.ajax({
            url: `/especificacoes/comparar/${especificacaoId}`,
            method: 'GET',
            data: {
                especificacaoBaseId: @json($especificacao->id),
                idioma: lang 
            },
            success: function(response) {
               $("#spinnerModal--" + especificacaoId + "").addClass("hidden");

                const container = $(`#modalComparacao--${especificacaoId} .modal-body`);

                const iguaisHtml = `
                    <h5 class="mb-3">Características Iguais</h5>
                    <ul class="list-group resumoContent">
                        ${response.iguais.map(i => `<li class="list-group-item">${i}</li>`).join('')}
                    </ul>
                `;

                let diferentesHtml = '';

                if (response.diferentes.comparado.length > 0 || response.diferentes.base.length > 0) {
                    diferentesHtml += `
                        <h5 class="mt-6 mb-3">Características Diferentes</h5>
                        <div class="row">
                    `;

                    if (response.diferentes.comparado.length > 0) {
                        diferentesHtml += `
                            <div class="col">
                                <h6>Especificação ${especificacaoId}</h6>
                                <ul class="list-group resumoContent">
                                    ${response.diferentes.comparado.map(i => `<li class="list-group-item">${i}</li>`).join('')}
                                </ul>
                            </div>
                        `;
                    }

                    if (response.diferentes.base.length > 0) {
                        diferentesHtml += `
                            <div class="col">
                                <h6>Especificação ${@json($especificacao->id)}</h6>
                                <ul class="list-group resumoContent">
                                    ${response.diferentes.base.map(i => `<li class="list-group-item">${i}</li>`).join('')}
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

    window.exportarParaWord = function(modalId, especificacaoId, codigoFocco = null) {
        let container = document.querySelector(`#${modalId} .modal-body`);
        if (!container) return;
        let condigo = '';
        let titulo = `<h2>Especificação ${especificacaoId}</h2>`;
        if (codigoFocco) {
            condigo = `<p>Código Focco: ${codigoFocco}</p>`;
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

});

</script>
@endsection