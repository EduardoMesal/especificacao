<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecificacaoObservacao extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'especificacacao_observacoes';

    protected $fillable = [
        'conteudo',
        'especificacao_id',
        'revisao_id',
        'observacao_anterior_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function observacaoAnterior()
    {
        return $this->belongsTo(self::class, 'observacao_anterior_id');
    }
}

