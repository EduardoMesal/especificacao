<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostra extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'atributos_amostra';

    protected $fillable = [
        'amostra_id',
        'tipo',
        'criado',
        'modificado',
        'excluido',
    ];

    public function amostra()
    {
        return $this->belongsTo(Amostra::class, 'amostra_id');
    }

    public function atributoAmostraExpecificacoes()
    {
        return $this->hasOne(AtributoAmostraEspecificacao::class, 'atributo_id');
    }

    public function atributoAmostraPedidos()
    {
        return $this->hasOne(AtributoAmostraPedido::class, 'atributo_id');
    }

    public function subAtributos()
    {
        return $this->hasMany(SubAtributoAmostra::class, 'atributo_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemAtributoAmostra::class, 'atributo_amostra_id');
    }

    public function imagensPedido()
    {
        return $this->hasMany(ImagemAtributoAmostraPedido::class, 'atributo_amostra_id');
    }
    public function atributosAmostrasIdiomas()
    {
        return $this->hasMany(AtributoAmostraIdioma::class, 'atributo_amostra_id');
    }
}
