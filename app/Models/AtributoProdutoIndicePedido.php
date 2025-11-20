<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoProdutoIndicePedido extends Model
{
    use HasFactory;

    protected $table = 'atributos_produto_indice_pedido';

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    
    protected $fillable = [
        'produto_id',
        'pedido_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoProdutoPedido::class, 'indice_produto_pedido_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemProdutoPedido::class, 'produto_indice_pedido_id');
    }
}