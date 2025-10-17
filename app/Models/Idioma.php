<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'idiomas';

    protected $fillable = [
        'nome',
        'codigo',
        'icone',
        'padrao',
        'criado',
        'modificado',
        'excluido',
    ];
}