<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\now;

class FoccoPedidosController extends Controller
{
    public function pedidos(Request $request)
    {
        DB::beginTransaction();

        try {
            $response = Http::withToken(config('focco.focco_token'))
                ->acceptJson()
                ->withoutVerifying()
                ->get('https://foccoerp.mesal.com.br/proweb/FoccoIntegrador/api/v1/Exportacao/pedido_api', [
                    'chave' => '9747696806'
                ]);

            if ($response->failed()) {
                dd([
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
            
            $pedidos = $response->json();

            foreach($pedidos['value'] as $pedido) {

                $cliente = Cliente::where('cliente_focco_id', $pedido['cod_cli'])->first();
                $usuario = User::where('usuario_focco_id', $pedido['usuario_id'])->first();
                
                if($cliente && $pedido['cod_divd'] == 1){
                    Pedido::firstOrCreate(
                        ['nome' => $pedido['num_pedido']],
                        [
                        'cliente_id' => $cliente->id,
                        'usuario_id' => $usuario->id,
                        'criado' => now()
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Pedidos criados com sucesso'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
