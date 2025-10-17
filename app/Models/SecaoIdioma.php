<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecaoIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'secoes_idiomas';

    protected $fillable = [
        'nome',
        'secao_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function secao()
    {
        return $this->belogsTo(Secao::class, 'secao_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}