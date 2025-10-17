<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAtributoAmostra extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'sub_atributos_amostra';

    protected $fillable = [
        'atributo_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function atributo()
    {
        return $this->belongsTo(AtributoAmostra::class, 'atributo_id');
    }

    public function especificacao()
    {
        return $this->hasOne(AtributoAmostraEspecificacao::class, 'sub_atributo_id');
    }
    
    public function subAtributosAmostrasIdiomas()
    {
        return $this->hasMany(SubAtributoAmostraIdioma::class, 'sub_atributos_amostra_id');
    }

}
