<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'atributos_idiomas';

    protected $fillable = [
        'nome',
        'observacao',
        'atributo_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function atributo()
    {
        return $this->belogsTo(Atributo::class, 'atributo_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}