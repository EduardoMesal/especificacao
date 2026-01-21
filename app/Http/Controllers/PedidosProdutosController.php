<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosAmostraRequest;
use App\Models\AtributoProdutoIndicePedido;
use App\Models\EspecificacaoProdutoPedido;
use App\Models\ImagemProdutoPedido;
use App\Models\ImagemAtributoProdutoPedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Services\ProdutoService;
use App\Services\DeleteDefaultService;
use App\Services\PedidoProdutoService;

class PedidosProdutosController extends Controller
{   

    public function index(Request $request, PedidoProdutoService $pedidoProdutoService)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'cliente_nome' => $request->input('cliente_nome'),
            'pedido' => $request->input('pedido')
        ];

        $produtos = $pedidoProdutoService->index($dados);

        return view('PedidosProdutos/index', [
            'produtos' => $produtos,
            'nome' => $dados['nome'] ?? '',
            'cliente_nome' => $dados['cliente_nome'] ?? '',
            'pedido' => $dados['pedido'] ?? '',
        ]);
    }

    public function criar_index(Request $request, ProdutoService $produtoService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $produtos = $produtoService->index($dados);

        return view('PedidosProdutos/criar_index', [
            'nome' => $dados['nome'] ?? '',
            'produtos' => $produtos,
        ]);
    }

    public function criar($id, PedidoProdutoService $pedidoProdutoService)
    {
        $result = $pedidoProdutoService->get_criar_produto($id);

        if (!$result['produto'] || !$result['pedidos']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum produto foi encontrado.'
            ]);
        }

        return view('PedidosProdutos/criar', [
            'produto' => $result['produto'],
            'pedidos' => $result['pedidos'],
        ]);
    }

    public function criar_action(PedidosAmostraRequest $request, $id, PedidoProdutoService $pedidoProdutoService)
    {   
        try {
    
            $data = $request->only(['imagens', 'produtosAtributo', 'unidade', 'tipo', 'att', 'pedido_id', 'produtoIndicePedidoId']);

            $pedidoProdutoService->criar_produto($data, $id);

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

    public function editar($id, PedidoProdutoService $pedidoProdutoService)
    {
        $query = $pedidoProdutoService->get_editar_produto($id);

        if (!$query['atributoProdutoPedido'] || !$query['produto']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum produto foi encontrado.'
            ]);
        }

        return view('PedidosProdutos/editar', [
            'produto' => $query['produto'],
            'atributoProdutoPedido' => $query['atributoProdutoPedido'],
            'pedidos' => $query['pedidos'],
        ]);
    }

    public function editar_action(PedidosAmostraRequest $request, $id, PedidoProdutoService $pedidoProdutoService)
    {   
        try {
    
            $data = $request->only(['imagens', 'produtosAtributo', 'pedido_id']);
            $pedidoProdutoService->editar_produto($data, $id);

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

    public function copiar($id, PedidoProdutoService $pedidoProdutoService)
    {
        $query = $pedidoProdutoService->get_editar_produto($id);

        if (!$query['atributoProdutoPedido'] || !$query['produto']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhum produto foi encontrado.'
            ]);
        }

        return view('PedidosProdutos/copiar', [
            'produto' => $query['produto'],
            'atributoProdutoPedido' => $query['atributoProdutoPedido'],
            'pedidos' => $query['pedidos'],
        ]);
    }

    public function upload_atributo_imagens_pedido(Request $request)
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
                $dest = public_path('assets/img/produtos/atributos/pedido');
                $image = Image::make($img->getRealPath());
                $image->save($dest . '/' . $photoName);
    
                ImagemAtributoProdutoPedido::create([
                    'imagem' => $photoName,
                    'indice_produto_pedido_id' => $indiceId,
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

    public function excluir_atributo_imagens_pedido($id)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        $imagem = ImagemAtributoProdutoPedido::where('id', $id)->first();
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
                    File::delete(public_path("/assets/img/produtos/atributos/pedido/" . $oldImg->imagem));
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

        $imagem = ImagemProdutoPedido::where('id', $id)->first();
        $hasMoreThanOneImg = ImagemProdutoPedido::where('arquivo', $imagem->arquivo)->count() > 1;
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
                    if($hasMoreThanOneImg == false){
                        File::delete(public_path("/assets/img/produtos/pedido/" . $oldImg->arquivo));
                    }
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

            AtributoProdutoIndicePedido::where('id', $id)->first(); 
    
            $deleteDefaultService->remove(new AtributoProdutoIndicePedido(), 'id', null, $id, null);

            EspecificacaoProdutoPedido::where('atributo_produto_indice_pedido_id', $id)->delete();

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
