<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemAtributoProduto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_atributo_produto';

    protected $fillable = [
        'imagem',
        'atributo_produto_id',
        'indice_produto_id',
    ];

    public function atributoProduto()
    {
        return $this->belongsTo(AtributoProduto::class, 'atributo_produto_id');
    }
}
