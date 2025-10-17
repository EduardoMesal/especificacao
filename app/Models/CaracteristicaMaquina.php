<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaMaquina extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'caracteristicas_maquina';

    protected $fillable = [
        'maquina_id',
        'caracteristica_id',
    ];
}
