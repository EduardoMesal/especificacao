<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemAmostra extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'imagens_amostra';

    protected $fillable = [
        'imagem',
        'amostra_indice_id',
    ];


    public function amostraIndice()
    {
        return $this->belongsTo(AtributoAmostraIndiceEspecificacao::class, 'amostra_indice_id');
    }
}
