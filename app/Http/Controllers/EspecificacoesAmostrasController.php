<?php

namespace App\Http\Controllers;

use App\Models\AtributoAmostraIndiceEspecificacao;
use App\Http\Requests\EspecificacoesAmostraRequest;
use App\Services\AmostraService;
use App\Services\DeleteDefaultService;

class EspecificacoesAmostrasController extends Controller
{   

    public function criar_amostra($especificacaoId, $id, AmostraService $amostraService)
    {
        $amostra = $amostraService->get_criar_amostra($id);

        if (!$amostra) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('Especificacoes/Amostras/adicionar', [
            'amostra' => $amostra,
            'especificacaoId' => $especificacaoId
        ]);
    }

    public function criar_amostra_action(EspecificacoesAmostraRequest $request, $especificacaoId, $id, AmostraService $amostraService)
    {   
        try {
    
            $data = $request->only(['imagens', 'amostrasAtributo', 'unidade', 'tipo', 'att']);

            $amostraService->criar_amostra($data, $id, $especificacaoId);

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
   
    public function editar_amostra($id, AmostraService $amostraService)
    {
        $query = $amostraService->get_editar_amostra($id);

        if (!$query['atributoAmostra'] || !$query['amostra']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('Especificacoes/Amostras/editar', [
            'amostra' => $query['amostra'],
            'atributoAmostra' => $query['atributoAmostra'],
            'maquinasEspecificacoesAssoc' => $query['maquinasEspecificacoesAssoc']
        ]);
    }

    public function editar_amostra_action(EspecificacoesAmostraRequest $request, $id, AmostraService $amostraService)
    {   
        try {
    
            $data = $request->only(['imagens', 'amostrasAtributo']);
            $amostraService->editar_amostra($data, $id);

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

    public function excluir_amostra($id, DeleteDefaultService $deleteDefaultService)
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
    
            $deleteDefaultService->remove(new AtributoAmostraIndiceEspecificacao(), 'id', null, $id, null);

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
