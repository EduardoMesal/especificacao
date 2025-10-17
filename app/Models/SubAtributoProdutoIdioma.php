<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAtributoProdutoIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'sub_atributos_produtos_idiomas';

    protected $fillable = [
        'nome',
        'observacao',
        'sub_atributos_produtos_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function subAtributoProduto()
    {
        return $this->belogsTo(SubAtributoProduto::class, 'sub_atributos_produtos_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}