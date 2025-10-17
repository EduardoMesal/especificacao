@if($resumo['comparavel'])
<div class="isComparavel" 
    data-bs-toggle="tooltip" 
    data-bs-placement="top"
    data-bs-custom-class="custom-tooltip"
    data-bs-title="Este item é comparável."
>
    <i class="bi bi-bookmark-fill"></i>
</div>
@endif

<div>
    {!! $resumo['caracteristica'] !!}:
    
    @if($resumo['tipo'] == 'texto')
        @if($resumo['conteudo'])
            {{ $resumo['conteudo'] }}{{ $resumo['unidade'] ? ' ' . $resumo['unidade'] : '' }};
            @else
            <span>Não informado;</span>
        @endif
        @elseif($resumo['tipo'] == 'multiplos')
            @if($resumo['conteudo'])
                {{ $resumo['conteudo'] }}{{ $resumo['unidade'] ? ' ' . $resumo['unidade'] : '' }};
            @else
                <span>Não informado;</span>
            @endif
        @else
            @if($resumo['atributo'])
                {{ $resumo['atributo'] }}{{ $resumo['atributo'] != 'PERSONALIZADO' ? $resumo['unidade'] : '' }};
            @else
                <span>Não informado;</span>
            @endif
    @endif
</div>

@if($resumo['observacao'])
    <span class="obsText">OBS: {!! $resumo['observacao'] !!}</span>
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
