<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemAtributoAmostra extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_atributo_amostra';

    protected $fillable = [
        'imagem',
        'atributo_amostra_id',
        'indice_amostra_id',
    ];


    public function atributoAmostra()
    {
        return $this->belongsTo(AtributoAmostra::class, 'atributo_amostra_id');
    }
}
