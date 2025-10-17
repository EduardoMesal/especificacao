<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TwoFactorController extends Controller
{
    public function showForm(Request $request)
    {   
        $dateNow = Carbon::now();

        if(Auth::user()->two_factor_expires_at && $dateNow > Auth::user()->two_factor_expires_at){
            return redirect()->route('login');
        }

        return view('segunda-etapa', [
            'code' => $request->code
        ]);
    }

    public function verifyCode(Request $request)
    {
        $user = Auth::user();

        // Validação do código e da expiração
        if ($user->two_factor_code === $request->code && now()->lt($user->two_factor_expires_at)) {
            // Limpar o código e expiração após o sucesso
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();

            session(['2fa_passed' => true]);

            Auth::login($user);

            // if ($user->tipo == 'adm') {
            //     return  redirect()->intended("/dashboard");
            // }

            return  redirect()->intended("/dashboard");
        }

        return back()->withErrors(['code' => 'Código inválido ou expirado'])->withInput();
    }
}
