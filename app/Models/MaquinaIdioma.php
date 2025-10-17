<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaquinaIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'maquinas_idiomas';

    protected $fillable = [
        'nome',
        'observacao',
        'observacao_comercial',
        'maquina_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquina()
    {
        return $this->belogsTo(Maquina::class, 'maquina_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}