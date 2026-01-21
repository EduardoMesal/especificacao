<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosAmostraRequest;
use App\Models\AtributoAmostraIndicePedido;
use App\Models\EspecificacaoAmostraPedido;
use App\Models\ImagemAmostraPedido;
use App\Models\ImagemAtributoAmostraPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Services\AmostraService;
use App\Services\DeleteDefaultService;
use App\Services\PedidoAmostraService;

class PedidosAmostrasController extends Controller
{   

    public function index(Request $request, PedidoAmostraService $pedidoAmostraService)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'cliente_nome' => $request->input('cliente_nome'),
            'pedido' => $request->input('pedido')
        ];

        $amostras = $pedidoAmostraService->index($dados);

        return view('PedidosAmostras/index', [
            'amostras' => $amostras,
            'nome' => $dados['nome'] ?? '',
            'cliente_nome' => $dados['cliente_nome'] ?? '',
            'pedido' => $dados['pedido'] ?? '',
        ]);
    }

    public function criar_index(Request $request, AmostraService $amostraService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $amostras = $amostraService->index($dados);

        return view('PedidosAmostras/criar_index', [
            'nome' => $dados['nome'] ?? '',
            'amostras' => $amostras,
        ]);
    }

    public function criar($id, PedidoAmostraService $pedidoAmostraService)
    {
        $result = $pedidoAmostraService->get_criar_amostra($id);

        if (!$result['amostra'] || !$result['pedidos']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('PedidosAmostras/criar', [
            'amostra' => $result['amostra'],
            'pedidos' => $result['pedidos'],
        ]);
    }

    public function criar_action(PedidosAmostraRequest $request, $id, PedidoAmostraService $pedidoAmostraService)
    {   
        try {
    
            $data = $request->only(['imagens', 'amostrasAtributo', 'unidade', 'tipo', 'att', 'pedido_id', 'amostraIndicePedidoId']);
            $pedidoAmostraService->criar_amostra($data, $id);

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

    public function editar($id, PedidoAmostraService $pedidoAmostraService)
    {
        $query = $pedidoAmostraService->get_editar_amostra($id);

        if (!$query['atributoAmostraPedido'] || !$query['amostra']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }


        return view('PedidosAmostras/editar', [
            'amostra' => $query['amostra'],
            'atributoAmostraPedido' => $query['atributoAmostraPedido'],
            'pedidos' => $query['pedidos'],
        ]);
    }

    public function editar_action(PedidosAmostraRequest $request, $id, PedidoAmostraService $pedidoAmostraService)
    {   
        try {
    
            $data = $request->only(['imagens', 'amostrasAtributo', 'pedido_id']);
            $pedidoAmostraService->editar_amostra($data, $id);

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

    public function copiar($id, PedidoAmostraService $pedidoAmostraService)
    {
        $query = $pedidoAmostraService->get_editar_amostra($id);

        if (!$query['atributoAmostraPedido'] || !$query['amostra']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('PedidosAmostras/copiar', [
            'amostra' => $query['amostra'],
            'atributoAmostraPedido' => $query['atributoAmostraPedido'],
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
                $dest = public_path('assets/img/amostras/atributos/pedido');
                $image = Image::make($img->getRealPath());
                $image->save($dest . '/' . $photoName);
    
                ImagemAtributoAmostraPedido::create([
                    'imagem' => $photoName,
                    'indice_amostra_pedido_id' => $indiceId,
                    'atributo_amostra_id' => $atributoId,
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

        $imagem = ImagemAtributoAmostraPedido::where('id', $id)->first();
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
                    throw new \Exception('Erro ao excluir a amostra.');
                }

                if ($response) {
                    DB::commit();
                    File::delete(public_path("/assets/img/amostras/atributos/pedido/" . $oldImg->imagem));
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

        $imagem = ImagemAmostraPedido::where('id', $id)->first();
        $hasMoreThanOneImg = ImagemAmostraPedido::where('arquivo', $imagem->arquivo)->count() > 1;
        
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
                    throw new \Exception('Erro ao excluir a amostra.');
                }

                if ($response) {
                    DB::commit();
                    if($hasMoreThanOneImg == false){
                        File::delete(public_path("/assets/img/amostras/pedido/" . $oldImg->arquivo));
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

            AtributoAmostraIndicePedido::where('id', $id)->first(); 
    
            $deleteDefaultService->remove(new AtributoAmostraIndicePedido(), 'id', null, $id, null);

            EspecificacaoAmostraPedido::where('atributo_amostra_indice_pedido_id', $id)->delete();

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
