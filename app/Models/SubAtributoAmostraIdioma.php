<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAtributoAmostraIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'sub_atributos_amostra_idiomas';

    protected $fillable = [
        'nome',
        'observacao',
        'sub_atributos_amostra_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function subAtributoAmostra()
    {
        return $this->belogsTo(SubAtributoAmostra::class, 'sub_atributos_amostra_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}