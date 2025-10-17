<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmostraMaquina extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'amostras_maquina';

    protected $fillable = [
        'maquina_id',
        'amostra_id',
    ];
}
