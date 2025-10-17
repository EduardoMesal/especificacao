<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_produtos';

    protected $fillable = [
        'imagem',
        'produto_indice_id',
    ];


    public function amostraIndice()
    {
        return $this->belongsTo(AtributoProdutoIndiceEspecificacao::class, 'produto_indice_id');
    }
}
