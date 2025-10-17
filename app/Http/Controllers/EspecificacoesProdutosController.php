<?php

namespace App\Http\Controllers;

use App\Models\Especificacao;
use App\Models\Cliente;
use App\Models\Caracteristica;
use App\Models\Produto;
use App\Models\Atributo;
use App\Models\AtributoEspecificacao;
use App\Models\Maquina;
use App\Models\ImagemProduto;
use App\Models\EspecificacaoObservacao;
use App\Models\AtributoProdutoEspecificacao;
use App\Models\ImagemAtributoProduto;
use App\Models\AtributoProdutoIndiceEspecificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EspecificacoesProdutoRequest;
use App\Services\ProdutoService;
use App\Services\DeleteDefaultService;

class EspecificacoesProdutosController extends Controller
{   

    public function criar_produto($especificacaoId, $id, ProdutoService $produtoService)
    {
        $produto = $produtoService->get_criar_produto_amostra($id);

        if (!$produto) {
            return redirect("/dashboard")->with('error', 'Produto não encontrado.');
        }

        return view('Especificacoes/Produtos/adicionar', [
            'produto' => $produto,
            'especificacaoId' => $especificacaoId
        ]);
    }
    
    public function criar_produto_action(EspecificacoesProdutoRequest $request, $especificacaoId, $id, ProdutoService $produtoService)
    {   
        try {
            $data = $request->only(['imagens', 'produtosAtributo']);

            $produtoService->criar_amostra($data, $id, $especificacaoId);

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
    
    public function editar_produto($id,  ProdutoService $produtoService)
    {
        $query = $produtoService->get_editar_produto_amostra($id);

        if (!$query['produto']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum produto foi encontrado.'
            ]);
        }
        
        return view('Especificacoes/Produtos/editar', [
            'produto' => $query['produto'],
            'atributoProduto' => $query['atributoProduto']
        ]);
    }
    
    public function editar_produto_action(EspecificacoesProdutoRequest $request, $id, ProdutoService $produtoService)
    {   
        try {
            $data = $request->only(['imagens', 'produtosAtributo']);

            $produtoService->editar_amostra($data, $id);

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
    
    public function excluir_produto($id, DeleteDefaultService $deleteDefaultService)
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

            $deleteDefaultService->remove(new AtributoProdutoIndiceEspecificacao(), 'id', null, $id, null);

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
