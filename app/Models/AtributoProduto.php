<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoProduto extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'atributos_produtos';

    protected $fillable = [
        'produto_id',
        'tipo',
        'criado',
        'modificado',
        'excluido',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function atributoProdutoExpecificacoes()
    {
        return $this->hasOne(AtributoProdutoEspecificacao::class, 'atributo_produto_id');
    }

    public function atributoProdutoPedidos()
    {
        return $this->hasOne(AtributoProdutoPedido::class, 'atributo_id');
    }

    public function subAtributos()
    {
        return $this->hasMany(SubAtributoProduto::class, 'atributo_produto_id');
    }

    public function imagens()
    {
        return $this->hasMany(ImagemAtributoProduto::class, 'atributo_produto_id');
    }
    
    public function imagensPedido()
    {
        return $this->hasMany(ImagemAtributoProdutoPedido::class, 'atributo_produto_id');
    }
    public function atributosProdutosIdiomas()
    {
        return $this->hasMany(AtributoProdutoIdioma::class, 'atributo_produto_id');
    }

}
