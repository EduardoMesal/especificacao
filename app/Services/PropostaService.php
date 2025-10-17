<?php
namespace App\Services;

use App\Models\Proposta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PropostaService
{
    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $proposta = new Proposta();

            $proposta->conteudo_proposta = $dados['conteudo_proposta'];
            $proposta->especificacao_id = $dados['especificacao_id'];
            $proposta->criado = date('Y-m-d H:i:s');

            $response = $proposta->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function editar(array $dados, int $propostaId)
    {
        DB::beginTransaction();

        try {

            $proposta = Proposta::where('id', $propostaId)->where('excluido', null)->first();

            if (!$proposta) {
                throw new \Exception('Nenhuma proposta foi encontrada.', 404);
            }

            if ($dados['conteudo_proposta'] && $dados['conteudo_proposta'] !== $proposta->conteudo_proposta) {
                $proposta->conteudo_proposta = $dados['conteudo_proposta'];
            }

            $response = $proposta->save();

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