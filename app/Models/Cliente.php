<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cnpj',
        'ie',
        'criado',
        'modificado',
        'excluido',
    ];

    public function especificacoes()
    {
        return $this->hasMany(Especificacao::class, 'cliente_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }

    public function clienteInformacoes()
    {
        return $this->hasOne(ClienteInformacao::class, 'cliente_id');
    }
}
