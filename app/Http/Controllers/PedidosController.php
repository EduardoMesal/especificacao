<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PedidosRequest;
use App\Models\Especificacao;
use App\Services\PedidoService;
use App\Services\DeleteDefaultService;

class PedidosController extends Controller
{

    public function index(Request $request, PedidoService $pedidoService)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'cliente_id' => $request->input('cliente_id')
        ];

        $query = $pedidoService->index($dados);

        return view('Pedidos/index', [
            'nome' => $dados['nome'] ?? '',
            'cliente_id' => $dados['cliente_id'] ?? '',
            'pedidos' => $query['pedidos'],
            'clientes' => $query['clientes'],
        ]);
    }

    public function criar(PedidoService $pedidoService)
    {
        $clientes = $pedidoService->get_criar();

        if (!$clientes) {
            return redirect('/clientes')->with([
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Cadastre ao menos um cliente para criar um pedido.',
            ]);
        }

        return view('Pedidos/criar', [
            'clientes' => $clientes
        ]);
    }

    public function criar_action(PedidosRequest $request, PedidoService $pedidoService)
    {
        try {
    
            $data = $request->only(['nome', 'cliente_id']);

            $pedidoService->criar($data);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
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
    
    public function editar($id, PedidoService $pedidoService)
    {
        $query = $pedidoService->get_editar($id);

        if (!$query['pedido']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum pedido foi encontrado.'
            ]);
        }

        return view('Pedidos/editar', [
            'pedido' => $query['pedido'],
            'clientes' => $query['clientes'],
        ]);
    }

    public function editar_action(PedidosRequest $request, $id, PedidoService $pedidoService)
    {
        try {
            $data = $request->only(['nome', 'cliente_id']);
            $pedidoService->editar($data, $id);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);

        } catch (\Exception $e) {
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

            // $verifyPedido = Pedido::where('id', $id)->withCount('especificacoes')->first();
            
            // if($verifyPedido->especificacoes_count > 0) {
            //      return response()->json([
            //         'success' => false,
            //         'title' => 'Oops...',
            //         'icon' => 'error',
            //         'message' => 'Você não pode excluir este pedido, pois ele está vinculada em algumas especificações.',
            //     ], 500);
            // }
    
            $deleteDefaultService->remove(new Pedido(), 'id', new Especificacao(), $id, 'pedido_id');
            
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
