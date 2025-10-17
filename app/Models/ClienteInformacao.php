<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteInformacao extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado';
    const UPDATED_AT = 'modificado';

    protected $table = 'clientes_informacoes';

    protected $fillable = [
        'cliente_id',
        'contato_comercial',
        'telefone_comercial',
        'email_comercial',
        'contato_tecnico',
        'telefone_tecnico',
        'email_tecnico',
        'criado',
        'modificado',
        'excluido',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}