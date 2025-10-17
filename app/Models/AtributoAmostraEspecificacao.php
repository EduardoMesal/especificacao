<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostraEspecificacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'atributos_amostra_especificacao';

    protected $fillable = [
        'indice_amostra_id',
        'sub_atributo_id',
        'atributo_id',
        'observacao_personalizada',
        'conteudo',
    ];

    public function indice()
    {
        return $this->belongsTo(AtributoAmostraIndiceEspecificacao::class, 'indice_amostra_id');
    }

    public function atributo()
    {
        return $this->belongsTo(AtributoAmostra::class, 'atributo_id');
    }

    public function subAtributo()
    {
        return $this->belongsTo(SubAtributoAmostra::class, 'sub_atributo_id');
    }

}