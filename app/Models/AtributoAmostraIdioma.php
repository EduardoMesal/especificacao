<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoAmostraIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'atributos_amostra_idiomas';

    protected $fillable = [
        'nome',
        'unidade',
        'atributo_amostra_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function atributoAmostra()
    {
        return $this->belogsTo(Amostra::class, 'atributo_amostra_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}