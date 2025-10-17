<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributoProdutoIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'atributos_produtos_idiomas';

    protected $fillable = [
        'nome',
        'unidade',
        'atributo_produto_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function atributoProduto()
    {
        return $this->belogsTo(AtributoProduto::class, 'atributo_produto_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}