<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmostraIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'amostras_idiomas';

    protected $fillable = [
        'nome',
        'aviso',
        'amostra_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function amostra()
    {
        return $this->belogsTo(Amostra::class, 'amostra_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}