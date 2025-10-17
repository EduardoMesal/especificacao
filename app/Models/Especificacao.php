<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Especificacao extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'especificacoes';

    protected $fillable = [
        'maquina_id',
        'pedido_id',
        'codigo_focco',
        'serie',
        'status',
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquina()
    {
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }

    public function atributos()
    {
        return $this->belongsToMany(Atributo::class, 'atributos_especificacao', 'especificacao_id', 'atributo_id');
    }

    public function amostras()
    {
        return $this->belongsToMany(AtributoAmostra::class, 'atributos_amostra_especificacao', 'especificacao_id', 'amostra_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'especificacao_id');
    }

    public function indiceEspecificacoes()
    {
        return $this->hasMany(AtributoAmostraIndiceEspecificacao::class, 'especificacao_id');
    }

    public function observacoes()
    {
        return $this->hasMany(EspecificacaoObservacao::class, 'especificacao_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
