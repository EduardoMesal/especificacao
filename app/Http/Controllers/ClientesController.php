<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;
use App\Services\ClienteService;
use App\Services\DeleteDefaultService;

class ClientesController extends Controller
{   
    public function index(Request $request, ClienteService $clienteService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $clientes = $clienteService->index($dados);

        return view('Clientes/index', [
            'nome' => $dados['nome'] ?? '',
            'clientes' => $clientes,
        ]);
    }

    public function criar()
    {
        return view('Clientes/criar', [  
        ]);
    }

    public function criar_action(ClienteRequest $request, ClienteService $clienteService)
    {
        try {
    
            $dados = [
                'nome' => $request->input('nome'),
                'cnpj' => $request->input('cnpj'),
                'ie' => $request->input('ie'),
                'contato_comercial' => $request->input('contato_comercial'),
                'telefone_comercial' => $request->input('telefone_comercial'),
                'email_comercial' => $request->input('email_comercial'),
                'contato_tecnico' => $request->input('contato_tecnico'),
                'telefone_tecnico' => $request->input('telefone_tecnico'),
                'email_tecnico' => $request->input('email_tecnico'),
            ];

            $clienteService->criar($dados);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
           if ($e->getMessage() === 'Esse cliente já foi cadastrado.') {
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => $e->getMessage(),
                ], 422);
            }

            // Para outros erros
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getCode() === 404
                    ? $e->getMessage()
                    : 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function editar($id, ClienteService $clienteService)
    {
       $cliente = $clienteService->getEditar($id);

       if (!$cliente) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhum cliente foi encontrado.'
            ]);
        }

        return view('Clientes/editar', [
            'cliente' => $cliente,
        ]);
    }

    public function editar_action(ClienteRequest $request, $id, ClienteService $clienteService)
    {
        try {
    
            $dados = [
                'nome' => $request->input('nome'),
                'cnpj' => $request->input('cnpj'),
                'ie' => $request->input('ie'),
                'contato_comercial' => $request->input('contato_comercial'),
                'telefone_comercial' => $request->input('telefone_comercial'),
                'email_comercial' => $request->input('email_comercial'),
                'contato_tecnico' => $request->input('contato_tecnico'),
                'telefone_tecnico' => $request->input('telefone_tecnico'),
                'email_tecnico' => $request->input('email_tecnico'),
            ];

            $clienteService->editar($dados, $id);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
            
        } catch (\Exception $e) {
            if ($e->getMessage() === 'Esse cliente já foi cadastrado.') {
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => $e->getMessage(),
                ], 422);
            }

            // Para outros erros
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getCode() === 404
                    ? $e->getMessage()
                    : 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function excluir($id, DeleteDefaultService $deleteDefaultService)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        try {

            $verifyClient = Cliente::where('id', $id)->withCount('especificacoes')->first();
            
            if($verifyClient->especificacoes_count > 0) {
                 return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => 'Você não pode excluir este cliente, pois ele está vinculado em algumas especificações.',
                ], 500);
            }
    
            $deleteDefaultService->remove(new Cliente(), 'id', null, $id, null);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Excluído com sucesso',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }
}
