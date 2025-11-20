<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostraPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'atributos_amostra_pedido';

    protected $fillable = [
        'indice_amostra_pedido_id',
        'sub_atributo_id',
        'atributo_id',
        'observacao_personalizada',
        'conteudo',
    ];

    public function indice()
    {
        return $this->belongsTo(AtributoAmostraIndicePedido::class, 'indice_amostra_pedido_id');
    }

    public function atributo()
    {
        return $this->belongsTo(AtributoAmostra::class, 'atributo_id');
    }

    public function subAtributo()
    {
        return $this->belongsTo(SubAtributoAmostra::class, 'sub_atributo_id');
    }
}