<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemAmostraPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_amostra_pedido';

    protected $fillable = [
        'imagem',
        'amostra_indice_pedido_id',
    ];


    public function amostraIndice()
    {
        return $this->belongsTo(AtributoAmostraIndicePedido::class, 'amostra_indice_pedido_id');
    }
}
