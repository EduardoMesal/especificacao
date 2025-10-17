<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'notificacoes';

    protected $fillable = [
        'usuario_id',
        'lead_id',
        'conteudo',
        'visualizada',
        'origem',
        'data_lancamento',
        'tipo',
        'clicado',
        'criado',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
