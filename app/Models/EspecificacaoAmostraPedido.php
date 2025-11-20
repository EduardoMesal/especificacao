<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecificacaoAmostraPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'especificacao_amostra_pedido';

    protected $fillable = [
        'especificacao_id',
        'atributo_amostra_indice_pedido_id',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function atributoAmostraIndicePedido()
    {
        return $this->belongsTo(AtributoAmostraIndicePedido::class, 'atributo_amostra_indice_pedido_id');
    }
}
