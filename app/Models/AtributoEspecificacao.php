<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoEspecificacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'atributos_especificacao';

    protected $fillable = [
        'especificacao_id',
        'atributo_id',
        'caracteristica_id',
        'revisao_id',
        'observacao_personalizada',
        'conteudo',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function atributo()
    {
        return $this->belongsTo(Atributo::class, 'atributo_id');
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id');
    }

    public function revisao()
    {
        return $this->belongsTo(Revisao::class, 'revisao_id');
    }
    
}
