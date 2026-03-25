<?php
namespace App\Services;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PedidoService
{

    public function index(array $dados = []): array     {
        $pedidos = Pedido::where('excluido',  null)->orderBy('id', 'DESC')->with('cliente')->with('usuario');
        
        if (!empty($dados['nome'])) {
            $pedidos->where('nome', 'like', '%' . $dados['nome'] . '%');
        }

        if (!empty($dados['cliente_nome'])) {
            $pedidos->whereHas('cliente', function ($query) use ($dados) {
                $query->where('nome', 'LIKE', "%{$dados['cliente_nome']}%");
            });
        }

        if(!empty($dados['usuario'])) {
            $pedidos->whereHas('usuario', function ($query) use ($dados) {
                $query->where('nome', 'LIKE', "%{$dados['usuario']}%");
            });
        }

        if (!empty($dados['criado'])) {
            [$date, $endDate] = explode(' - ', $dados['criado']);

            $date = Carbon::createFromFormat('d/m/Y', trim($date));
            $endDate = Carbon::createFromFormat('d/m/Y', trim($endDate));

            if ($date->month <= $endDate->month) {

                $pedidos->whereRaw(
                    '(MONTH(criado) > ? OR (MONTH(criado) = ? AND DAY(criado) >= ?))
                    AND (MONTH(criado) < ? OR (MONTH(criado) = ? AND DAY(criado) <= ?))',
                    [
                        $date->month,
                        $date->month,
                        $date->day,
                        $endDate->month,
                        $endDate->month,
                        $endDate->day
                    ]
                );

            } else {

                $pedidos->whereRaw(
                    '(MONTH(criado) > ? OR (MONTH(criado) = ? AND DAY(criado) >= ?))
                    OR (MONTH(criado) < ? OR (MONTH(criado) = ? AND DAY(criado) <= ?))',
                    [
                        $date->month,
                        $date->month,
                        $date->day,
                        $endDate->month,
                        $endDate->month,
                        $endDate->day
                    ]
                );
            }
        }
        
        $query = [
            'pedidos' => $pedidos->paginate(20)->withQueryString(),
        ];

        return $query;
    }

    public function get_criar()
    {
        $clientes = Cliente::select('id', 'nome')->where('excluido', null)->get();

        return $clientes;
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $pedido = new Pedido();
            $pedido->nome = $dados['nome'];
            $pedido->cliente_id = $dados['cliente_id'];
            $pedido->usuario_id = Auth::user()->id;
            $pedido->criado = date('Y-m-d H:i:s');

            $response = $pedido->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar(int | string $id)
    {
        $pedido = Pedido::where('id', $id)
            ->where('excluido', null)
            ->with(['cliente' => function ($query) {
                $query->whereNull('excluido'); 
            }])
            ->with(['especificacoes' => function ($query) {
                $query->whereNull('excluido'); 
            }])
            ->with(['amostras' => function ($query) {
                $query->whereNull('excluido')
                ->whereHas('amostra', function ($q) {
                    $q->whereNull('excluido');
                })
                ->with(['amostra' => function ($subQuery) {
                    $subQuery->whereNull('excluido')
                     ->with([
                        'amostrasIdiomas' => function ($q)  {
                            $q->whereHas('idiomas', function ($query) {
                                $query->where('codigo', 'pt');
                            });
                        },
                    ]);
                }]);
            }])
            ->with(['produtos' => function ($query) {
                $query->whereNull('excluido')
                ->whereHas('produto', function ($q) {
                    $q->whereNull('excluido');
                })
                ->with(['produto' => function ($subQuery) {
                    $subQuery->whereNull('excluido')
                     ->with([
                        'produtosIdiomas' => function ($q)  {
                            $q->whereHas('idiomas', function ($query) {
                                $query->where('codigo', 'pt');
                            });
                        },
                    ]);
                }]);
            }])
            ->first();

        $clientes = Cliente::select('id', 'nome')->where('excluido', null)->get();

        return compact('pedido', 'clientes');
    }

    public function editar(array $dados, int $pedidoId)
    {
        DB::beginTransaction();

        try {

            $pedido = Pedido::where('id', $pedidoId)->where('excluido', null)->first();

            if (!$pedido) {
                throw new \Exception('Nenhum pedido foi encontrado.', 404);
            }

            if ($dados['nome'] && $dados['nome'] !== $pedido->nome) {
                $pedido->nome = $dados['nome'];
            }

            if ($dados['cliente_id'] && $dados['cliente_id'] !== $pedido->cliente_id) {
                $pedido->cliente_id = $dados['cliente_id'];
            }

            $response = $pedido->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}