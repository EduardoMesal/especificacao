<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'caracteristicas';

    protected $fillable = [
        'secao_id',
        'tipo',
        'comparavel',
        'criado',
        'modificado',
        'excluido',
    ];

    public function secao()
    {
        return $this->belongsTo(Secao::class, 'secao_id');
    }

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class, 'caracteristicas_maquina', 'caracteristica_id', 'maquina_id');
    }

    public function atributos()
    {
        return $this->hasMany(Atributo::class, 'caracteristica_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'atributo_id');
    }
    
    public function caracteristicasIdiomas()
    {
        return $this->hasMany(CaracteristicaIdioma::class, 'caracteristica_id');
    }
}
