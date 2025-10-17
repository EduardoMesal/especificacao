<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'produtos';

    protected $fillable = [
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class, 'produtos_maquina', 'produto_id', 'maquina_id');
    }

    public function atributos()
    {
        return $this->hasMany(AtributoProduto::class, 'produto_id');
    }

    public function produtosIdiomas()
    {
        return $this->hasMany(ProdutoIdioma::class, 'produto_id');
    }
}
