<?php
namespace App\Services;

use App\Models\EquipamentoOrigem;
use App\Models\EquipamentoOrigemIdioma;
use App\Models\Idioma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class EquipamentoService
{
    public function index(array $dados = []): LengthAwarePaginator
    {
        $idioma = 'pt';

        $query = EquipamentoOrigem::where('excluido',  null)->orderBy('id', 'desc')->with([
            'equipamentosOrigemIdiomas' => function ($q) use ($idioma) {
                $q->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('equipamentosOrigemIdiomas', function ($q) use ($dados, $idioma) {
                $q->whereHas('idiomas', function ($query) use ($idioma) {
                    $query->where('codigo', $idioma);
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        return $query->paginate(20)->withQueryString();
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $eq = EquipamentoOrigem::create([
                'criado' => Carbon::now(),
            ]);

            $response = $eq->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            EquipamentoOrigemIdioma::create([
                'equipamento_origem_id' => $eq->id,
                'idioma_id' => 1,
                'nome' => $dados['nome'], 
                'criado' => Carbon::now(),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getEditar(int | string $id, array $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $equipamento = EquipamentoOrigem::where('id', $id)
        ->where('excluido', null)
        ->with([
            'equipamentosOrigemIdiomas' => function ($q) use ($idioma) {
                $q->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ])
        ->first();

        return $equipamento;
    }

    public function editar(array $dados, int $equipamentoId, string $idioma)
    {
        DB::beginTransaction();

        try {

            $equipamento = EquipamentoOrigem::where('id', $equipamentoId)->where('excluido', null)->first();

            if (!$equipamento) {
                throw new \Exception('Nenhum equipamento foi encontrado.', 404);
            }

            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            
            $equipamento_idioma = EquipamentoOrigemIdioma::query()
                ->where([
                    'excluido' => null,
                    'equipamento_origem_id' => $equipamentoId,
                    'idioma_id' => $getIdioma->id
                ])
                ->first();

            if (!$equipamento_idioma) {
                EquipamentoOrigemIdioma::create([
                    'equipamento_origem_id' => $equipamento->id,
                    'idioma_id' => $getIdioma->id,
                    'nome' => $dados['nome'], 
                    'criado' => Carbon::now(),

                ]);

            } else {
                $equipamento_idioma->update([
                    'nome' => $dados['nome'], 
                ]);
            }

            $response = $equipamento->save();

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