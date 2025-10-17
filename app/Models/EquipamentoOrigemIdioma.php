<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentoOrigemIdioma extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';
    protected $table = 'equipamento_origem_idiomas';

    protected $fillable = [
        'nome',
        'equipamento_origem_id',
        'idioma_id',
        'criado',
        'modificado',
        'excluido',
    ];

    public function equipamentoOrigem()
    {
        return $this->belogsTo(EquipamentoOrigem::class, 'equipamento_origem_id');
    }

    public function idiomas()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}