<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AtributoProdutoEspecificacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'atributos_produtos_especificacao';

    protected $fillable = [
        'indice_produto_id',
        'sub_atributo_id',
        'atributo_produto_id',
        'observacao_personalizada',
        'conteudo',
    ];

    public function indice()
    {
        return $this->belongsTo(AtributoProdutoIndiceEspecificacao::class, 'indice_produto_id');
    }

    public function atributo()
    {
        return $this->belongsTo(AtributoProduto::class, 'atributo_produto_id');
    }

    public function subAtributo()
    {
        return $this->belongsTo(SubAtributoProduto::class, 'sub_atributo_id');
    }

}