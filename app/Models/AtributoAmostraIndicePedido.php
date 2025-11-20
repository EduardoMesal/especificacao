<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostraIndicePedido extends Model
{
    use HasFactory;

    protected $table = 'atributos_amostra_indice_pedido';

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    
    protected $fillable = [
        'amostra_id',
        'pedido_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function amostra()
    {
        return $this->belongsTo(Amostra::class, 'amostra_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoAmostraPedido::class, 'indice_amostra_pedido_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemAmostraPedido::class, 'amostra_indice_pedido_id');
    }
}