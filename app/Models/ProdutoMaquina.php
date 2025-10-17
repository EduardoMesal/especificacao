<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoMaquina extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'produtos_maquina';

    protected $fillable = [
        'maquina_id',
        'produto_id',
    ];
}
