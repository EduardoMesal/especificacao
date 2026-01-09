<?php
namespace App\Services;

use App\Models\Idioma;
use App\Models\Secao;
use App\Models\SecaoIdioma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SecaoService
{   
    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = Secao::where('excluido',  null)->orderBy('id', 'desc')
        ->with([
            'secoesIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');

        if (!empty($dados['nome'])) {
            $query->whereHas('secoesIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
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

            $secao = Secao::create([
                'criado' => Carbon::now(),
            ]);

            $response = $secao->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            SecaoIdioma::create([
                'secao_id' => $secao->id,
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

    public function get_editar(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $secao = Secao::where('id', $id)
        ->where('excluido', null)
        ->with([
            'secoesIdiomas' => function ($q) use ($idioma) {
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

        return $secao;
    }

    public function editar(array $dados, int $secaoId, string $idioma)
    {
        DB::beginTransaction();

        try {

            $secao = Secao::where('id', $secaoId)->where('excluido', null)->first();

            if (!$secao) {
                throw new \Exception('Nenhuma seção foi encontrada.', 404);
            }

            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            $secao_idioma = SecaoIdioma::query()
                ->where([
                    'excluido' => null,
                    'secao_id' => $secaoId,
                    'idioma_id' => $getIdioma->id
                ])
                ->first();

            if (!$secao_idioma) {
                SecaoIdioma::create([
                    'secao_id' => $secao->id,
                    'idioma_id' => $getIdioma->id,
                    'nome' => $dados['nome'], 
                    'criado' => Carbon::now(),

                ]);

            } else {
                $secao_idioma->update([
                    'nome' => $dados['nome'], 
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}