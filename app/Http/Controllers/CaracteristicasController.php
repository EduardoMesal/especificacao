<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use App\Models\Secao;
use App\Models\Caracteristica;
use App\Models\AtributoEspecificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CaracteristicaRequest;
use App\Services\CaracteristicaService;
use App\Services\DeleteDefaultService;

class CaracteristicasController extends Controller
{   
    public function index(Request $request, CaracteristicaService $caracteristicaService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $caracteristicas = $caracteristicaService->index($dados);

        return view('Caracteristicas/index', [
            'nome' => $dados['nome'] ?? '',
            'caracteristicas' => $caracteristicas,
        ]);
    }

    public function criar(CaracteristicaService $caracteristicaService)
    {
        $query = $caracteristicaService->getCriar();

        return view('Caracteristicas/criar', [
            'secoes' => $query['secoes'],
            'caracteristicas' => $query['caracteristicas'],
        ]);
    }

    public function criar_action(CaracteristicaRequest $request, CaracteristicaService $caracteristicaService){
        try {
    
            $data = $request->only(['nome', 'comparavel', 'unidade', 'tipo', 'aviso', 'secao_id', 'att', 'observacao']);

            $caracteristicaService->criar($data);

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

    public function editar(Request $request, $id, CaracteristicaService $caracteristicaService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $query = $caracteristicaService->getEditar($id, $dados);

        if (!$query['caracteristica']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma característica foi encontrada.'
            ]);
        }

        return view('Caracteristicas/editar', [
            'caracteristica' => $query['caracteristica'],
            'caracteristicas' => $query['caracteristicas'],
            'secoes' => $query['secoes'],
        ]);
    }

    public function editar_action(CaracteristicaRequest $request, $id, CaracteristicaService $caracteristicaService)
    {   
          try {
    
            $dados = $request->only([
                'lang',
            ]);

            $data = $request->only(['nome', 'comparavel', 'unidade', 'tipo', 'aviso', 'secao_id', 'att', 'att_ids_originais', 'observacao']);

            $caracteristicaService->editar($data, $id, $dados);

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

    public function copiar($id, CaracteristicaService $caracteristicaService)
    {
        $query = $caracteristicaService->copiar($id);

        if (!$query['caracteristica']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma característica foi encontrada.'
            ]);
        }

        return view('Caracteristicas/copiar', [
            'caracteristica' => $query['caracteristica'],
            'secoes' => $query['secoes'],
        ]);
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
    
            $deleteDefaultService->remove(new Caracteristica(), 'id', null, $id, null);

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
