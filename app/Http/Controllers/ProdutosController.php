<?php

namespace App\Http\Controllers;

use App\Models\AtributoProduto;
use App\Models\SubAtributoProduto;
use App\Models\AtributoProdutoIndiceEspecificacao;
use App\Models\ImagemAtributoProduto;
use App\Models\AtributoProdutoEspecificacao;
use App\Models\Produto;
use App\Models\ImagemProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProdutoRequest;
use App\Http\Requests\AtributoProdutoRequest;
use App\Services\ProdutoService;
use App\Services\DeleteDefaultService;

class ProdutosController extends Controller
{   
    public function index(Request $request, ProdutoService $produtoService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $produtos = $produtoService->index($dados);

        return view('Produtos/index', [
            'nome' => $dados['nome'] ?? '',
            'produtos' => $produtos,
        ]);
    }

    public function criar()
    {
        return view('Produtos/criar', [
        ]);
    }

    public function criar_action(ProdutoRequest $request, ProdutoService $produtoService){

        try {
    
            $data = $request->only(['nome', 'aviso']);

            $produtoService->criar($data);

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

    public function criar_atributo($id, ProdutoService $produtoService)
    {
        $query = $produtoService->get_criar_atributo($id);

        if (!$query['produto']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum produto foi encontrado.'
            ]);
        }

        return view('Produtos/criarAtributo', [
            'produto' => $query['produto'],
            'atributosProdutos' => $query['atributosProdutos'],
        ]);
    }

    public function criar_atributo_action(AtributoProdutoRequest $request, $id, ProdutoService $produtoService){

        try {
    
            $dados = $request->only(['nome', 'unidade', 'tipo', 'att', 'observacao']);

            $produtoService->criar_atributo($dados, $id);

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

    public function editar(Request $request, $id, ProdutoService $produtoService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $produto = $produtoService->get_editar($id, $dados);

        if (!$produto) {
            return redirect("/dashboard")->with('error', 'Nenhum produto foi encontrado.');
        }

        return view('Produtos/editar', [
            'produto' => $produto,
        ]);
    }

    public function editar_action(ProdutoRequest $request, $id, ProdutoService $produtoService)
    {
        try {
    
            $data = $request->only(['nome', 'aviso']);
            $idioma = $request->get('lang', 'pt');

            $produtoService->editar($data, $id, $idioma);

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

    public function editar_atributo(Request $request, $id, ProdutoService $produtoService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $result = $produtoService->get_editar_atributo($id, $dados);

        if (!$result['atributo']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum atributo do produto foi encontrado.'
            ]);
        }

        return view('Produtos/editarAtributo', [
            'atributo' => $result['atributo'],
            'atributosProdutos' => $result['atributosProdutos'],
        ]);
    }

    public function editar_atributo_action(AtributoProdutoRequest $request, $id, ProdutoService $produtoService)
    {
        try {
    
            $data = $request->only(['nome', 'tipo', 'observacao', 'unidade', 'att', 'att_ids_originais']);
            $idioma = $request->get('lang', 'pt');
            $produtoService->editar_atributo($data, $id, $idioma);

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
    
            $deleteDefaultService->remove(new Produto(), 'id', new AtributoProdutoIndiceEspecificacao(), $id, 'produto_id');

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

    public function excluir_produto_atributo($id, DeleteDefaultService $deleteDefaultService)
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
    
            $deleteDefaultService->remove(new AtributoProduto(), 'id', null, $id, null);

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

    public function excluir_imagem($id)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        $imagem = ImagemProduto::where('id', $id)->first();
        if (!$imagem) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Imagem não encontrada',
            ], 404);
        }

        if ($imagem) {

            try {
                DB::beginTransaction();
                $oldImg = $imagem;
                $response = $imagem->delete();

                if (!$response) {
                    throw new \Exception('Erro ao excluir o produto.');
                }

                if ($response) {
                    DB::commit();
                    File::delete(public_path("/assets/img/produtos/" . $oldImg->imagem));
                    return response()->json([
                        'success' => true,
                        'title' => 'Feito',
                        'icon' => 'success',
                        'message' => 'Excluído com sucesso',
                    ], 200);
                }
                
            } catch (\Exception $e) {
                DB::rollBack();
        
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'erro' => $e->getMessage(),
                    'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'title' => 'Oops...',
            'icon' => 'error',
            'message' => 'Falha ao excluir imagem',
        ], 500);
    }

    public function upload_atributo_imagens(Request $request)
    {
        if ($request->hasFile('file')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'file' => 'required|max:3072',
                ],
                [
                    'file.required' => 'Preencha o campo imagem.',
                    'file.max' => 'O tamanho máximo permitido é 3MB.',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => 'O tamanho máximo permitido é 3MB.',
                    'errors' => $validator->errors(),
                ], 422);
            }


            try {
                $img = $request->file('file');
                $atributoId = $request->input('atributo_id');
                $indiceId = $request->input('indice_id');
    
                $extension = $img->getClientOriginalExtension();
                $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;
                $dest = public_path('assets/img/produtos/atributos');
                $image = Image::make($img->getRealPath());
                $image->save($dest . '/' . $photoName);
    
                ImagemAtributoProduto::create([
                    'imagem' => $photoName,
                    'indice_produto_id' => $indiceId,
                    'atributo_produto_id' => $atributoId,
                ]);
    
                return response()->json(['success' => true]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'title' => 'Erro ao salvar imagem',
                    'icon' => 'error',
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    
        return response()->json(['success' => false, 'message' => 'Nenhuma imagem enviada.'], 400);
    }
    
    public function excluir_atributo_imagens($id)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        $imagem = ImagemAtributoProduto::where('id', $id)->first();
        if (!$imagem) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Imagem não encontrada',
            ], 404);
        }

        if ($imagem) {

            try {
                DB::beginTransaction();
                $oldImg = $imagem;
                $response = $imagem->delete();

                if (!$response) {
                    throw new \Exception('Erro ao excluir o produto.');
                }

                if ($response) {
                    DB::commit();
                    File::delete(public_path("/assets/img/produtos/atributos/" . $oldImg->imagem));
                    return response()->json([
                        'success' => true,
                        'title' => 'Feito',
                        'icon' => 'success',
                        'message' => 'Excluído com sucesso',
                    ], 200);
                }
                
            } catch (\Exception $e) {
                DB::rollBack();
        
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'erro' => $e->getMessage(),
                    'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'title' => 'Oops...',
            'icon' => 'error',
            'message' => 'Falha ao excluir imagem',
        ], 500);
    }

}
