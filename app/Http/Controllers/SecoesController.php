<?php

namespace App\Http\Controllers;

use App\Models\Secao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SecoesRequest;
use App\Services\SecaoService;
use App\Services\DeleteDefaultService;

class SecoesController extends Controller
{

    public function index(Request $request, SecaoService $secaoService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $secoes = $secaoService->index($dados);

        return view('Secoes/index', [
            'nome' => $dados['nome'] ?? '',
            'secoes' => $secoes,
        ]);
    }

    public function criar()
    {
        return view('Secoes/criar', [
        ]);
    }

    public function criar_action(SecoesRequest $request, SecaoService $secaoService)
    {
        try {
    
            $data = $request->only(['nome']);

            $secaoService->criar($data);

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

    public function editar(Request $request, $id, SecaoService $secaoService)
    {

        $dados = $request->only([
            'lang',
        ]);
        
       $secao = $secaoService->get_editar($id, $dados);

        if (!$secao) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhum seção foi encontrada.'
            ]);
        }

        return view('Secoes/editar', [
            'secao' => $secao,
        ]);
    }

    public function editar_action(SecoesRequest $request, $id, SecaoService $secaoService)
    {
        try {

            $data = $request->only(['nome']);
            $idioma = $request->get('lang', 'pt');
            $secaoService->editar($data, $id, $idioma);

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

            $verifySecao = Secao::where('id', $id)->withCount('caracteristicas')->first();
            
            if($verifySecao->caracteristicas_count > 0) {
                 return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => 'Você não pode excluir esta seção, pois ele está vinculada com algumas características.',
                ], 500);
            }
    
            $deleteDefaultService->remove(new Secao(), 'id', null, $id, null);
            
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

    public function ordenar(Request $request) {
        if (isset($request->order) && is_array($request->order)) {
            foreach ($request->order as $index => $secaoId) {
                Secao::where('id', $secaoId)
                    ->update(['ordem' => $index + 1]);
            }
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Seções atualizadas com sucesso.'
        ], 200);
    }
}
