<?php

namespace App\Http\Controllers;

use App\Models\EquipamentoOrigem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EquipamentoRequest;
use App\Services\EquipamentoService;
use App\Services\DeleteDefaultService;

class EquipamentosController extends Controller
{   
    public function index(Request $request, EquipamentoService $equipamentoService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $equipamentos = $equipamentoService->index($dados);

        return view('Equipamentos/index', [
            'nome' => $dados['nome'] ?? '',
            'equipamentos' => $equipamentos,
        ]);
    }

    public function criar()
    {
        return view('Equipamentos/criar', [  
        ]);
    }

    public function criar_action(EquipamentoRequest $request, EquipamentoService $equipamentoService)
    {
        try {
    
            $data = $request->only(['nome']);

            $equipamentoService->criar($data);

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

    public function editar(Request $request,$id, EquipamentoService $equipamentoService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $equipamento = $equipamentoService->getEditar($id, $dados);

        if (!$equipamento) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum equipamento foi encontrado.'
            ]);
        }

        return view('Equipamentos/editar', [
            'equipamento' => $equipamento,
        ]);
    }

    public function editar_action(EquipamentoRequest $request, $id, EquipamentoService $equipamentoService)
    {
        try {
    
            $data = $request->only(['nome']);
            $idioma = $request->get('lang', 'pt');
            $equipamentoService->editar($data, $id, $idioma);

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

            $equipamento = EquipamentoOrigem::where('id', $id)->withCount([
                'maquinas' => function ($query) {
                    $query->whereNull('excluido');
                }
            ])->first(); 

            if($equipamento->maquinas_count > 0) {
                 return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => 'Você não pode excluir esse equipamento, pois ele está vinculado a alguma máquina.',
                ], 500);
            }
    
            $deleteDefaultService->remove(new EquipamentoOrigem(), 'id', null, $id, null);

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
