<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecificacaoProdutoPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'especificacao_produto_pedido';

    protected $fillable = [
        'especificacao_id',
        'atributo_produto_indice_pedido_id',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function atributoAmostraIndicePedido()
    {
        return $this->belongsTo(AtributoProdutoIndicePedido::class, 'atributo_produto_indice_pedido_id');
    }
}
