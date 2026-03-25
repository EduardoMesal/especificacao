<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class FoccoClientesController extends Controller
{
    public function clientes(Request $request)
    {
        DB::beginTransaction();

        try {
            $response = Http::withToken(config('focco.focco_token'))
                ->acceptJson()
                ->withoutVerifying()
                ->get('https://foccoerp.mesal.com.br/proweb/FoccoIntegrador/api/v1/Exportacao/clientes_api', [
                    'chave' => '9747696806'
                ]);

            if ($response->failed()) {
                dd([
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
            
            $clientes = $response->json();

            foreach($clientes['value'] as $cliente) {

                $cnpjOrCpf = '';

                $getClienteId = explode("-", $cliente['id_externo']);
                $clienteId = $getClienteId[0];

                if(!empty($cliente['cnpj_cpf'])) {
                    $cnpjOrCpf = strlen($cliente['cnpj_cpf']) == 13
                        ? '0'.$cliente['cnpj_cpf']
                        : $cliente['cnpj_cpf'];
                }

                $newCliente = Cliente::firstOrCreate(
                    ['cliente_focco_id' => $clienteId],
                    [
                        'nome' => $cliente['nome'],
                        'cnpj' => $cnpjOrCpf,
                        'criado' => now(),
                    ]
                );

                $newCliente->clienteInformacoes()->firstOrCreate(
                    ['cliente_id' => $newCliente->id],
                    ['criado' => now()]
                );
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Clientes criados com sucesso'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
