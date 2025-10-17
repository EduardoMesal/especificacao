<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoProdutoIndiceEspecificacao extends Model
{
    use HasFactory;


    protected $table = 'atributos_produto_indice_especificacao';

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    
    protected $fillable = [
        'produto_id',
        'especificacao_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function especificacao()
    {
        return $this->belongsTo(Especificacao::class, 'especificacao_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoProdutoEspecificacao::class, 'indice_produto_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemProduto::class, 'produto_indice_id');
    }
}