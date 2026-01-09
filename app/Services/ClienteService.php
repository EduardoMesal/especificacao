<?php
namespace App\Services;

use App\Models\Cliente;
use App\Models\ClienteInformacao;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClienteService
{
    public function index(array $dados = []): LengthAwarePaginator
    {
        $query =  Cliente::where('excluido',  null)->orderBy('id', 'desc');

        if (!empty($dados['nome'])) {
            $query->where('nome', 'like', '%' . $dados['nome'] . '%');
        }

        return $query->paginate(20)->withQueryString();
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $clienteExistente = Cliente::where('nome', $dados['nome'])->first();
            
            if ($clienteExistente) {
                throw new \Exception('Esse cliente já foi cadastrado.');
                return;
            }

            $cliente = new Cliente();

            $cliente->nome = $dados['nome'];
            $cliente->cnpj = preg_replace('/\D/', '', $dados['cnpj'] ?? '');
            $cliente->ie = $dados['ie'] ?? '';
            $cliente->criado = date('Y-m-d H:i:s');
            $response = $cliente->save();

            $clienteInformacao = new ClienteInformacao();
            $clienteInformacao->cliente_id = $cliente->id;
            $clienteInformacao->contato_comercial = $dados['contato_comercial'] ?? '';
            $clienteInformacao->telefone_comercial = $dados['telefone_comercial'] ?? '';
            $clienteInformacao->email_comercial = $dados['email_comercial'] ?? '';
            $clienteInformacao->contato_tecnico = $dados['contato_tecnico'] ?? '';
            $clienteInformacao->telefone_tecnico = $dados['telefone_tecnico'] ?? '';
            $clienteInformacao->email_tecnico = $dados['email_tecnico'] ?? '';
            $clienteInformacao->criado = date('Y-m-d H:i:s');

            $response = $clienteInformacao->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getEditar(int | string $id)
    {
        $cliente = Cliente::where('id', $id)
        ->where('excluido', null)
        ->with(['clienteInformacoes' => function ($query) {
            $query->where('excluido', null);
        }])
        ->first();

        return $cliente;
    }
    
    public function editar(array $dados, int $clienteId)
    {
        DB::beginTransaction();

        try {

            $cliente = Cliente::where('id', $clienteId)->where('excluido', null)->first();

            $clienteExistente = Cliente::where('nome', $dados['nome'])->first();
            
            if($dados['nome'] != $cliente->nome){
                $clienteExistente = Cliente::where('nome', $dados['nome'])->first();
                
                if ($clienteExistente) {
                    throw new \Exception('Esse cliente já foi cadastrado.');
                }
            }

            if (!$cliente) {
                throw new \Exception('Nenhum cliente foi encontrado.', 404);
            }

            if ($dados['nome'] && $dados['nome'] !== $cliente->nome) {
                $cliente->nome = $dados['nome'];
            }

            $cliente->cnpj = preg_replace('/\D/', '', $dados['cnpj']);
            $cliente->ie = $dados['ie'];

            $response = $cliente->save();

            $clienteInformacao = ClienteInformacao::where('cliente_id', $clienteId)->first();

            if (!$clienteInformacao) {
                $clienteInformacao = new ClienteInformacao();
                $clienteInformacao->cliente_id = $clienteId;
            }

            $clienteInformacao->contato_comercial = $dados['contato_comercial'] ?? '';
            $clienteInformacao->telefone_comercial = $dados['telefone_comercial'] ?? '';
            $clienteInformacao->email_comercial = $dados['email_comercial'] ?? '';
            $clienteInformacao->contato_tecnico = $dados['contato_tecnico'] ?? '';
            $clienteInformacao->telefone_tecnico = $dados['telefone_tecnico'] ?? '';
            $clienteInformacao->email_tecnico = $dados['email_tecnico'] ?? '';
            $response = $clienteInformacao->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
