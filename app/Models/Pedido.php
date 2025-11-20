<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'pedidos';

    protected $fillable = [
        'nome',
        'cliente_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function especificacoes()
    {
        return $this->hasMany(Especificacao::class);
    }

    public function amostras()
    {
        return $this->hasMany(AtributoAmostraIndicePedido::class, 'pedido_id');
    }

    public function produtos()
    {
        return $this->hasMany(AtributoProdutoIndicePedido::class, 'pedido_id');
    }
}
