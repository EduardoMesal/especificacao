<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaquinaImagem extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'maquinas_imagens';

    protected $fillable = [
        'nome',
        'imagem',
        'maquina_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function maquina()
    {
        return $this->belogsTo(Maquina::class, 'maquina_id');
    }
}