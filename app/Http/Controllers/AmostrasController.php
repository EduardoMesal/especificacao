<?php

namespace App\Http\Controllers;

use App\Models\AtributoAmostra;
use App\Models\SubAtributoAmostra;
use App\Models\AtributoAmostraIndiceEspecificacao;
use App\Models\ImagemAtributoAmostra;
use App\Models\AtributoAmostraEspecificacao;
use App\Models\Amostra;
use App\Models\ImagemAmostra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AmostraRequest;
use App\Http\Requests\AtributoAmostraRequest;
use App\Services\AmostraService;
use App\Services\DeleteDefaultService;

class AmostrasController extends Controller
{   

    public function index(Request $request, AmostraService $amostraService)
    {
        $dados = [
            'nome' => $request->input('nome')
        ];

        $amostras = $amostraService->index($dados);

        return view('Amostras/index', [
            'nome' => $dados['nome'] ?? '',
            'amostras' => $amostras,
        ]);
    }

    public function criar()
    {
        return view('Amostras/criar', [
        ]);
    }

    public function criar_action(AmostraRequest $request, AmostraService $amostraService){

        try {
    
            $data = $request->only(['nome', 'aviso']);
            $amostraService->criar($data);

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

    public function criar_atributo($id, AmostraService $amostraService)
    {
        $query = $amostraService->getCriarAtributo($id);

        if (!$query['amostra']) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('Amostras/criarAtributo', [
            'amostra' => $query['amostra'],
            'atributosAmostras' => $query['atributosAmostras'],
        ]);
    }

    public function criar_atributo_action(AtributoAmostraRequest $request, $id, AmostraService $amostraService){

        try {
    
            $dados = $request->only(['nome', 'unidade', 'tipo', 'att', 'observacao']);
            $amostraService->criar_atributo($dados, $id);

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

    public function editar(Request $request, $id, AmostraService $amostraService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $amostra = $amostraService->getEditar($id, $dados);

        if (!$amostra) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhuma amostra foi encontrada.'
            ]);
        }

        return view('Amostras/editar', [
            'amostra' => $amostra,
        ]);
    }

    public function editar_action(AmostraRequest $request, $id, AmostraService $amostraService)
    {
        try {
    
            $data = $request->only(['nome', 'aviso']);
            $idioma = $request->get('lang', 'pt');
            $amostraService->editar($data, $id, $idioma);

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

    public function editar_atributo(Request $request, $id, AmostraService $amostraService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $query = $amostraService->getEditarAtributo($id, $dados);

        if (!$query['atributo']) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhum atributo foi encontrado.'
            ]);
        }

        return view('Amostras/editarAtributo', [
            'atributo' => $query['atributo'],
            'atributosAmostras' => $query['atributosAmostras'],
        ]);
    }

    public function editar_atributo_action(AtributoAmostraRequest $request, $id, AmostraService $amostraService)
    {
        try {
    
            $data = $request->only(['nome', 'tipo', 'observacao', 'unidade', 'att', 'att_ids_originais']);
            $idioma = $request->get('lang', 'pt');
            $amostraService->editar_atributo($data, $id, $idioma);

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
    
            $deleteDefaultService->remove(new Amostra(), 'id', new AtributoAmostraIndiceEspecificacao(), $id, 'amostra_id');

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

    public function excluir_amostra_atributo($id, DeleteDefaultService $deleteDefaultService)
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
    
            $deleteDefaultService->remove(new AtributoAmostra(), 'id', null, $id, null);

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

        $imagem = ImagemAmostra::where('id', $id)->first();
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
                    File::delete(public_path("/assets/img/amostras/" . $oldImg->imagem));
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
                $dest = public_path('assets/img/amostras/atributos');
                $image = Image::make($img->getRealPath());
                $image->save($dest . '/' . $photoName);
    
                ImagemAtributoAmostra::create([
                    'imagem' => $photoName,
                    'indice_amostra_id' => $indiceId,
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

        $imagem = ImagemAtributoAmostra::where('id', $id)->first();
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
                    File::delete(public_path("/assets/img/amostras/atributos/" . $oldImg->imagem));
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

    public function copiar_action(Request $request, AmostraService $amostraService)
    {   
        try {
            
            $dados = $request->only(['especificacoes', 'indice_amostra_id']);

            $amostraService->copiar_action($dados);

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

}
