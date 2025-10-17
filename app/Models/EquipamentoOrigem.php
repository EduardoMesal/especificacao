<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentoOrigem extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'equipamento_origem';

    protected $fillable = [
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquinas()
    {
        return $this->hasMany(Maquina::class, 'equipamento_id');
    }

    public function equipamentosOrigemIdiomas()
    {
        return $this->hasMany(EquipamentoOrigemIdioma::class, 'equipamento_origem_id');
    }
    
}
