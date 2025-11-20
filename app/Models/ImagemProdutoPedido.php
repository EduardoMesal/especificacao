<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemProdutoPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_produto_pedido';

    protected $fillable = [
        'imagem',
        'produto_indice_pedido_id',
    ];


    public function amostraIndice()
    {
        return $this->belongsTo(AtributoProdutoIndicePedido::class, 'produto_indice_pedido_id');
    }
}
