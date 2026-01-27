<ul class="list-group resumoContent" style="margin-bottom: 15px;">
    @php
    $renderizados = [];
    $multiplosAgrupados = collect($rev['itens'])->where('tipo', 'multiplos')->groupBy('caracteristica');
    @endphp

    @foreach ($rev['itens'] as $resumo)
    {{-- MULTIPLOS: renderizar agrupado por caracteristica, apenas 1 vez --}}
    @if($resumo['tipo'] === 'multiplos')
    @if(!in_array($resumo['caracteristica'], $renderizados))
    @php
    $renderizados[] = $resumo['caracteristica'];
    $anyHasChanged = false;
    foreach($multiplosAgrupados[$resumo['caracteristica']] as $item) {
    if($item['especificacaoAnteriorHasChanged']) {
    $anyHasChanged = true;
    break;
    }
    }
    @endphp
    <li class="p-3 bg-light rounded-2 border position-relative {{ $resumo['excluido'] ? 'disabledList' : ''}} {{$anyHasChanged ? 'border-warning' : 'border-light'}}" style="margin-left: 0px;">
        <div>
            <span style="font-weight: 600; color: #000">
                @if ($resumo['caracteristica'])
                {!! $resumo['caracteristica'] !!}:
                @else
                {{__('messages.nao_informado')}}:
                @endif
            </span>
        </div>
        @foreach($multiplosAgrupados[$resumo['caracteristica']] as $item)
        <div class="">
            <span style="font-weight: 600; color: #000">
                @if($item['atributo'])
                {{ $item['atributo'] }}:
                @else
                {{__('messages.nao_informado')}}:
                @endif
            </span>
            @if($rev['hasBeforeRevisao'] && ($item['conteudoRevisao'] != $item['conteudo']))
            @if($item['conteudoRevisao'])
            {{ $item['conteudoRevisao'] }}{{ $item['unidade'] ? ' '.$item['unidade'] : '' }};
            @else
            <span>{{__('messages.nao_informado')}};</span>
            @endif
            <i class="bi bi-arrow-right"></i>
            @endif
            @if($item['conteudo'])
            {{ $item['conteudo'] }}{{ $item['unidade'] ? ' '.$item['unidade'] : '' }};
            @else
            <span>{{__('messages.nao_informado')}};</span>
            @endif
        </div>
        @if($rev['hasBeforeRevisao'] && ($item['observacaoRevisao'] && $item['observacaoRevisao'] != $item['observacao']))
        <!-- @if($item['observacaoRevisao'])
                                <div class="obsText">OBS:  {!! $item['observacaoRevisao'] !!} <i class="bi bi-arrow-right"></i> {!! $item['observacao'] !!}</div>
                            @endif -->
        @if($resumo['observacaoRevisao'])
        <div class="obsText">
            OBS:
            @if(!empty($resumo['observacaoRevisao']))
            {!! $resumo['observacaoRevisao'] !!}
            @else
            <span style="color: #e2231a;"></span>
            @endif
            <i class="bi bi-arrow-right"></i>
            @if(!empty($resumo['observacao']))
            {!! $resumo['observacao'] !!}
            @else
            <span style="color: #e2231a;">Observação removida pelo usuário.</span>
            @endif
        </div>
        @endif
        @else
        @if($item['observacao'])
        <div class="obsText">OBS: {!! $item['observacao'] !!}</div>
        @endif
        @endif

        @endforeach
    </li>
    @endif

    {{-- SELECIONÁVEL ou TEXTO --}}
    @else
    <li class="p-3 bg-light rounded-2 border  position-relative {{ $resumo['excluido'] ? 'disabledList' : ''}} {{$resumo['especificacaoAnteriorHasChanged'] ? 'border-warning' : 'border-light'}}" style="margin-left: 0px;">
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
            @if($rev['hasBeforeRevisao'] && ($resumo['conteudoRevisao'] != $resumo['conteudo'] || $resumo['atributoNomeRevisao'] != $resumo['atributo']))
            @if($resumo['tipo'] === 'selecionavel' && $resumo['atributoNomeRevisao'])
            {{ $resumo['atributoNomeRevisao'] }}{{ $resumo['atributoNomeRevisao'] != 'PERSONALIZADO' ? ($resumo['unidade'] ? ' '. $resumo['unidade'] : '') : '' }};
            @elseif($resumo['tipo'] === 'texto' && $resumo['conteudoRevisao'])
            {{ $resumo['conteudoRevisao'] }}{{ $resumo['unidade'] ? ' '. $resumo['unidade'] : '' }};
            @else
            <span>{{__('messages.nao_informado')}};</span>
            @endif
            <i class="bi bi-arrow-right"></i>
            @endif
            @if($resumo['tipo'] === 'selecionavel' && $resumo['atributo'])
            {{ $resumo['atributo'] }}{{ $resumo['atributo'] != 'PERSONALIZADO' ? ($resumo['unidade'] ? ' '. $resumo['unidade'] : '') : '' }};
            @elseif($resumo['tipo'] === 'texto' && $resumo['conteudo'])
            {{ $resumo['conteudo'] }}{{ $resumo['unidade'] ? ' '. $resumo['unidade'] : '' }};
            @else
            <span>{{__('messages.nao_informado')}};</span>
            @endif
        </div>

        @if($rev['hasBeforeRevisao'] && ($resumo['observacaoRevisao'] && $resumo['observacaoRevisao'] != $resumo['observacao']))
        @if($resumo['observacaoRevisao'])
        <div class="obsText">
            OBS:
            @if(!empty($resumo['observacaoRevisao']))
            {!! $resumo['observacaoRevisao'] !!}
            @else
            <span style="color: #e2231a;"></span>
            @endif
            <i class="bi bi-arrow-right"></i>
            @if(!empty($resumo['observacao']))
            {!! $resumo['observacao'] !!}
            @else
            <span style="color: #e2231a;">Observação removida pelo usuário.</span>
            @endif
        </div>
        @endif
        @else
        @if($resumo['observacao'])
        <div class="obsText">OBS: {!! $resumo['observacao'] !!}</div>
        @endif
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
</ul>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingObservacoes--{{$rev['id']}}">
        <button class="accordion-button collapsed" style="font-weight: bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseObservacoes--{{$rev['id']}}" aria-expanded="false" aria-controls="collapseObservacoes--{{$rev['id']}}">
            Observações
        </button>
    </h2>
    <div id="collapseObservacoes--{{$rev['id']}}" class="accordion-collapse collapse" aria-labelledby="headingObservacoes--{{$rev['id']}}">
        <div class="accordion-body">
            <div class="resumoContent">
                <ul class="list-group">
                    @if (count($rev['observacoes']) > 0)
                    @foreach ($rev['observacoes'] as $key => $observacao)
                    @php
                    $hasChanged = (
                    $observacao['conteudo_anterior'] !== null &&
                    $observacao['conteudo_anterior'] !== $observacao['conteudo']
                    );
                    @endphp
                    <li style="margin-left: 0px" class="p-3 bg-light rounded-2 border position-relative {{$hasChanged ? 'border-warning' : 'border-light'}}"><span style="font-weight: 600; color: #000;">Observação {!! $key + 1 !!}:</span>
                        @if($hasChanged) {{ $observacao['conteudo_anterior'] }} <i class="bi bi-arrow-right"></i>@endif {!! $observacao['conteudo'] !!}
                    </li>
                    @endforeach
                    @else
                    <li style="margin-left: 0px" class="p-3 bg-light rounded-2 border border-light position-relative">Nenhuma observação foi encontrada.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>