<?php

namespace App\Http\Controllers;

use App\Models\Proposta;
use App\Models\Especificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PropostaRequest;
use App\Services\PropostaService;
use App\Services\DeleteDefaultService;

class PropostasController extends Controller
{

    public function index(Request $request)    {   

        $propostas = Proposta::where('excluido',  null)->orderBy('ordem', 'ASC')->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('Propostas/index', [
            'propostas' => $propostas,
        ]);
    }

    public function criar($id)
    {   
        $especificacao = Especificacao::where('id', $id)
            ->where('excluido', null)
            ->first();

        return view('Propostas/criar', [
            'especificacao' => $especificacao
        ]);
    }

    public function criar_action(PropostaRequest $request, PropostaService $propostaService)
    {
        try {
    
            $data = $request->only(['conteudo_proposta', 'especificacao_id']);

            $propostaService->criar($data);

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

    public function editar($id)
    {
        $proposta = Proposta::where('id', $id)
            ->first();

        if (!$proposta) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhum proposta foi encontrada.'
            ]);
        }

        if ($proposta) {
            return view('Propostas/editar', [
                'proposta' => $proposta,
            ]);
        }
    }

    public function editar_action(PropostaRequest $request, $id, PropostaService $propostaService)
    {
        try {
            $data = $request->only(['conteudo_proposta']);
            $propostaService->editar($data, $id);

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
    
            $deleteDefaultService->remove(new Proposta(), 'id', null, $id, null);
            
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
