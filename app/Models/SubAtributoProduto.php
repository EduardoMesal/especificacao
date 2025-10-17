<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAtributoProduto extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'sub_atributos_produtos';

    protected $fillable = [
        'atributo_produto_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function atributo()
    {
        return $this->belongsTo(AtributoProduto::class, 'atributo_produto_id');
    }

    public function especificacao()
    {
        return $this->hasOne(AtributoProdutoEspecificacao::class, 'sub_atributo_id');
    }

    public function subAtributosProdutosIdiomas()
    {
        return $this->hasMany(SubAtributoProdutoIdioma::class, 'sub_atributos_produtos_id');
    }

}
