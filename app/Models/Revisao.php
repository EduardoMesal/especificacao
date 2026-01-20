<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Revisao extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'revisoes';

    protected $fillable = [
        'nome',
        'especificacao_id',
        'revisao_anterior_id',
        'usuario_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function especificacoes()
    {
        return $this->hasMany(AtributoEspecificacao::class, 'revisao_id');
    }

    public function especificacoesObservacoes()
    {
        return $this->hasMany(EspecificacaoObservacao::class, 'revisao_id');
    }

    public function revisaoAnterior()
    {
        return $this->belongsTo(self::class, 'revisao_anterior_id');
    }
}
