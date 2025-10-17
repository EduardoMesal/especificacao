<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'produtos_idiomas';

    protected $fillable = [
        'nome',
        'aviso',
        'produto_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function produto()
    {
        return $this->belogsTo(Produto::class, 'produto_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}