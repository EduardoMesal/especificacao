<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostraIndiceEspecificacao extends Model
{
    use HasFactory;


    protected $table = 'atributos_amostra_indice_especificacao';

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    
    protected $fillable = [
        'amostra_id',
        'especificacao_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function amostra()
    {
        return $this->belongsTo(Amostra::class, 'amostra_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoAmostraEspecificacao::class, 'indice_amostra_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemAmostra::class, 'amostra_indice_id');
    }
}