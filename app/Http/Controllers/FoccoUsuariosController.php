<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

class FoccoUsuariosController extends Controller
{
    public function clientes(Request $request)
    {
        DB::beginTransaction();

        try {
            $response = Http::withToken(config('focco.focco_token'))
                ->acceptJson()
                ->withoutVerifying()
                ->get('https://foccoerp.mesal.com.br/proweb/FoccoIntegrador/api/v1/Exportacao/usuarios_api', [
                    'chave' => '9747696806'
                ]);

            if ($response->failed()) {
                dd([
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
            
            $usuarios = $response->json();

            foreach($usuarios['value'] as $usuario) {
               
                // $newCliente = Cliente::firstOrCreate(
                //     ['cliente_focco_id' => $clienteId],
                //     [
                //         'nome' => $cliente['nome'],
                //         'cnpj' => $cnpjOrCpf,
                //         'criado' => now(),
                //     ]
                // );

                if(!$usuario['email']){
                    continue;
                }

                $createUser = new User();
                $createUser->nome = $usuario['nome'];
                $createUser->email = $usuario['email'];
                $createUser->tipo = 'adm';
                $createUser->usuario_focco_id = $usuario['usuario_id'];
                $createUser->login_focco = $usuario['usuario_login'];
                $createUser->criado = date('Y-m-d H:i:s');
                $createUser->password = Hash::make('mesal@2026');
                $createUser->avatar = 'avatar.png';
            }

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Usuários criados com sucesso'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
