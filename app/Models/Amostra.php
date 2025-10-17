<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amostra extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'amostras';

    protected $fillable = [
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class, 'amostras_maquina', 'amostra_id', 'maquina_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoAmostra::class, 'amostra_id');
    }

    public function amostrasIdiomas()
    {
        return $this->hasMany(AmostraIdioma::class, 'amostra_id');
    }

}
