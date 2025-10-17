<?php
namespace App\Services;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordService
{
    public function solicitarResetSenha(string $email): string
    {
        $usuarioExiste = User::where('email', $email)
            ->whereNull('excluido')
            ->exists();

        if (!$usuarioExiste) {
            return 'invalid';
        }

        $jaSolicitado = PasswordReset::where('email', $email)->first();

        if ($jaSolicitado) {
            return 'ja_solicitado';
        }

        $token = Str::random(64);

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $userName = User::select('nome')->where('email', $email)->first();
        $actionLink = route('ShowResetForm', ['token' => $token, 'email' => $email]);

        Mail::send('email-forgot', [
            'action_link' => $actionLink,
            'nome' => $userName->nome,
        ], function ($message) use ($email) {
            $message->from('naoresponda@mesal.app.br', 'Mesal Máquinas')
                    ->to($email)
                    ->subject('Redefinir senha');
        });

        return 'sucesso';
    }

    public function validarTokenReset(string $email, string $token): bool
    {
        $registro = PasswordReset::where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$registro) {
            return false;
        }

        $criado = Carbon::parse($registro->created_at)->timezone('America/Sao_Paulo');
        $agora = Carbon::now();

        if ($agora->greaterThan($criado->addHour())) {
            PasswordReset::where('email', $email)
                ->where('token', $token)
                ->delete();

            return false;
        }

        return true;
    }

    public function redefinirSenha(string $email, string $token, string $password): string
    {
        $registroToken = PasswordReset::where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$registroToken) {
            return 'token_expirado';
        }

        $usuario = User::where('email', $email)->first();

        if (!$usuario) {
            return 'usuario_nao_encontrado';
        }

        $usuario->password = Hash::make($password);
        $usuario->save();

        PasswordReset::where('email', $email)
            ->where('token', $token)
            ->delete();

        return 'sucesso';
    }
}
