<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemAtributoProdutoPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_atributo_produto_pedido';

    protected $fillable = [
        'imagem',
        'atributo_produto_id',
        'indice_produto_pedido_id',
    ];


    public function atributoAmostra()
    {
        return $this->belongsTo(AtributoProduto::class, 'atributo_produto_id');
    }
}
