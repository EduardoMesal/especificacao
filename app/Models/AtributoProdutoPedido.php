<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoProdutoPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'atributos_produto_pedido';

    protected $fillable = [
        'indice_produto_pedido_id',
        'sub_atributo_id',
        'atributo_id',
        'observacao_personalizada',
        'conteudo',
    ];

    public function indice()
    {
        return $this->belongsTo(AtributoProdutoIndicePedido::class, 'indice_produto_pedido_id');
    }

    public function atributo()
    {
        return $this->belongsTo(AtributoProduto::class, 'atributo_id');
    }

    public function subAtributo()
    {
        return $this->belongsTo(SubAtributoProduto::class, 'sub_atributo_id');
    }
}