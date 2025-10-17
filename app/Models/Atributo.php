<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'atributos';

    protected $fillable = [
        'caracteristica_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'atributos_pedido', 'atributo_id', 'especificacao_id')->withPivot('caracteristica_id');
    }

    public function atributoExpecificacoes()
    {
        return $this->hasOne(AtributoEspecificacao::class, 'atributo_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'atributo_id');
    }

    public function atributosIdiomas()
    {
        return $this->hasMany(AtributoIdioma::class, 'atributo_id');
    }

}
