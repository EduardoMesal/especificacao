<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secao extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'secoes';

    protected $fillable = [
        'ordem',
        'criado',
        'modificado',
        'excluido',
    ];

    public function secoesIdiomas()
    {
        return $this->hasMany(SecaoIdioma::class, 'secao_id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(Caracteristica::class, 'secao_id');
    }
}