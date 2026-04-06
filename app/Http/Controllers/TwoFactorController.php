<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TwoFactorController extends Controller
{
    public function showForm(Request $request)
    {   
        $user = Auth::user();
        
        if(!$user){
            return redirect('/login')->withErrors([
            ]);
        }

        if(session('2fa_passed')){
            return redirect('/dashboard')->with([
            ]);
        }

        if (!$user->two_factor_expires_at || now()->gte($user->two_factor_expires_at)) {
            Auth::logout(); 
            session()->forget('2fa_passed');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return back()->withErrors([
                'error' => 'Código expirado.'
            ]);
        }

        return view('segunda-etapa', [
            'code' => $request->code
        ]);
    }

    
    public function verifyCode(Request $request)
    {
        $user = Auth::user();
    
        if (!$user->two_factor_expires_at || now()->gte($user->two_factor_expires_at)) {
            Auth::logout(); 
            session()->forget('2fa_passed');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/login')->withErrors([
                'error' => 'Código expirado.'
            ]);
        }

        if (
            $user->two_factor_code === $request->code
        ) {
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->two_factor_attempts = 0;
            $user->save();

            session(['2fa_passed' => true]);
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        }

        $user->increment('two_factor_attempts');

        if ($user->two_factor_attempts >= 3) {
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->two_factor_attempts = 0;
            $user->save();
            
            Auth::logout(); 
            session()->forget('2fa_passed');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/login')->withErrors([
                'error' => 'Código expirado.'
            ]);
        }

        return back()->withErrors([
            'code' => 'Código inválido. Tentativas restantes: ' . (3 - $user->two_factor_attempts)
        ])->withInput();
    }

    // public function verifyCode(Request $request)
    // {
    //     $user = Auth::user();

    //     // Validação do código e da expiração
    //     if ($user->two_factor_code === $request->code && now()->lt($user->two_factor_expires_at)) {
    //         // Limpar o código e expiração após o sucesso
    //         $user->two_factor_code = null;
    //         $user->two_factor_expires_at = null;
    //         $user->save();

    //         session(['2fa_passed' => true]);
    //         Auth::login($user);
    //         $request->session()->regenerate();
    //         return  redirect()->intended("/dashboard");
    //     }

    //     return back()->withErrors(['code' => 'Código inválido ou expirado'])->withInput();
    // }

}
