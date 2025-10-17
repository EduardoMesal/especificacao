<?php
namespace App\Services;

use App\Models\Especificacao;
use App\Models\Maquina;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardService
{
    public function index(array $dados = []): array 
    {
       
        $especificacoesSearch = Especificacao::where('excluido', null)
        ->with(['pedido.cliente' => fn($query) => $query->whereNull('excluido')])
        ->with(['maquina' => fn($query) => 
            $query->whereNull('excluido')->with([
                'maquinasIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ])
        ])
        ->when($dados['codigo_focco'], fn($q) => $q->where('codigo_focco', $dados['codigo_focco']))
        ->when($dados['serie'], fn($q) => $q->where('serie', 'LIKE', "%{$dados['serie']}%"))
        ->when($dados['maquina_id'], fn($q) => $q->where('maquina_id', $dados['maquina_id']))
        ->when($dados['cliente_id'], fn($q) => $q->whereHas('pedido.cliente', function ($query) use ($dados) {
                $query->where('id', $dados['cliente_id']);
            }))        
        ->orderBy('criado', 'desc')
        ->take(30)
        ->get();

        $page = request()->get('page', 1);
        $perPage = 10;

        $items = $especificacoesSearch->slice(($page - 1) * $perPage, $perPage)->values();

        $especificacoes = new LengthAwarePaginator($items, $especificacoesSearch->count(), $perPage, $page, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        $especificacoesGraph = Especificacao::select('id', 'criado', 'excluido')->where('excluido', null)->get();
        $maquinas = Maquina::where('excluido', null)
        ->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get()
        ->map(function ($maquina) {
            return [
                'id' => $maquina->id,
                'nome' => $maquina->maquinasIdiomas->first()->nome,
            ];
        });
        
        $clientes = Cliente::where('excluido', null)->get();

        $especificacoesPerMonths = [];

        $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        for ($i = 1; $i <= 12; $i++) {
            $month = $meses[$i - 1];

            $especificacoesCriados = $especificacoesGraph->filter(function ($p) use ($i) {
                return $p->criado->month == $i && $p->criado->year == Carbon::now()->year;
            })->count();

            $especificacoesPerMonths[] = [
                'month' => $month,
                'especificacoes' => $especificacoesCriados,
            ];
        }

        $query = [
            'especificacoes' => $especificacoes,
            'especificacoesPerMonths' => $especificacoesPerMonths,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
        ];

        return $query; 
    }
}
