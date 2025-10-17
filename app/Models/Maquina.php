<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'maquinas';

    protected $fillable = [
        'slug',
        'imagem',
        'equipamento_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function caracteristicas()
    {
        return $this->belongsToMany(Caracteristica::class, 'caracteristicas_maquina', 'maquina_id', 'caracteristica_id');
    }

    public function amostras()
    {
        return $this->belongsToMany(Amostra::class, 'amostras_maquina', 'maquina_id', 'amostra_id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_maquina', 'maquina_id', 'produto_id');
    }

    public function expecificacoes()
    {
        return $this->hasMany(Especificacao::class, 'maquina_id');
    }

    public function equipamento()
    {
        return $this->belongsTo(EquipamentoOrigem::class, 'equipamento_id');
    }

    public function maquinasIdiomas()
    {
        return $this->hasMany(MaquinaIdioma::class, 'maquina_id');
    }
}   
