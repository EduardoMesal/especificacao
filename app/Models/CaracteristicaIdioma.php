<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'caracteristicas_idiomas';

    protected $fillable = [
        'nome',
        'aviso',
        'unidade',
        'caracteristica_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function caracteristica()
    {
        return $this->belogsTo(Caracteristica::class, 'caracteristica_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}