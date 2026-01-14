<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use App\Models\Caracteristica;
use App\Models\Amostra;
use App\Models\Produto;
use App\Models\CaracteristicaMaquina;
use App\Models\AmostraMaquina;
use App\Models\ProdutoMaquina;
use App\Models\EquipamentoOrigem;
use App\Models\AtributoEspecificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MaquinaRequest;
use App\Services\MaquinaService;
use App\Services\DeleteDefaultService;

class MaquinasController extends Controller
{

    public function index(Request $request, MaquinaService $maquinaService)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'equipamento_id' => $request->input('equipamento_id')
        ];

        $query = $maquinaService->index($dados);

        return view('Maquinas/index', [
            'nome' => $dados['nome'] ?? '',
            'equipamento_id' => $dados['equipamento_id'] ?? '',
            'maquinas' => $query['maquinas'],
            'equipamentos' => $query['equipamentos']
        ]);
    }

    public function criar(MaquinaService $maquinaService)
    {
        $query = $maquinaService->get_criar();

        return view('Maquinas/criar', [
            'caracteristicas' => $query['caracteristicas'],
            'equipamentos' => $query['equipamentos'],
            'amostras' => $query['amostras'],
            'produtos' => $query['produtos'],
        ]);
    }

    public function criar_action(MaquinaRequest $request, MaquinaService $maquinaService)
    {
        try {
    
            $data = $request->only(['imagem', 'nome', 'ncm', 'equipamento_id', 'caracteristicas', 'amostras', 'produtos', 'observacao']);

            $maquinaService->criar($data);

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

    public function editar(Request $request, $id, MaquinaService $maquinaService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $query = $maquinaService->get_editar($id, $dados);

        if (!$query['maquina']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma máquina foi encontrada.'
            ]);
        }

        return view('Maquinas/editar', [
            'maquina' => $query['maquina'],
            'caracteristicas' => $query['caracteristicas'],
            'caracteristicasIds' => $query['caracteristicasIds'],
            'equipamentos' => $query['equipamentos'],
            'amostras' => $query['amostras'],
            'produtos' => $query['produtos'],
            'amostrasIds' => $query['amostrasIds'],
            'produtosIds' => $query['produtosIds'],
        ]);
    }
    
    public function editar_action(MaquinaRequest $request, $id, MaquinaService $maquinaService)
    {
        try {
    
            $data = $request->only(['imagem', 'nome', 'ncm', 'equipamento_id', 'caracteristicas', 'amostras', 'produtos', 'observacao']);
            $idioma = $request->get('lang', 'pt');

            $maquinaService->editar($data, $id, $idioma);

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

            $maquina = Maquina::where('id', $id)->withCount([
                'expecificacoes' => function ($query) {
                    $query->whereNull('excluido');
                }
            ])->first(); 

            if($maquina->expecificacoes_count > 0) {
                 return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'message' => 'Você não pode excluir esta máquina, pois ela está vinculada com algumas especificações.',
                ], 500);
            }
    
            $deleteDefaultService->remove(new Maquina(), 'id', null, $id, null);

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
