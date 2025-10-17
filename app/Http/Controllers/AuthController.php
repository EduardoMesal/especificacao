<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsuarioLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Exception;

class AuthController extends Controller
{

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->two_factor_code == '' && session('2fa_passed')) {
                return redirect("/dashboard");
            }

        } 
        
        return view('login');
    }

    // public function login_action(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ], [
    //         'email.required' => 'Preencha o campo email.',
    //         'password.required' => 'Preencha o campo senha.',
    //     ]);

    //     if (!Auth::attempt($credentials)) {
    //         return back()->with([
    //             'error' => 'As credenciais informadas são inválidas. Verifique seus dados e tente novamente.',
    //         ])->withInput();
    //     }

    //     $user = Auth::user();
    //     if ($user->excluido !== null) {
    //         Auth::logout();
    //         return back()->with([
    //             'error' => 'As credenciais informadas são inválidas. Verifique seus dados e tente novamente.',
    //         ])->withInput();
    //     }

    //     if ($user->tipo == 'adm') {
    //         return  redirect()->intended("/dashboard");
    //     }

    // }

    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Preencha o campo email.',
            'password.required' => 'Preencha o campo senha.',
        ]);

        $key = $this->throttleKey($request);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => "Muitas tentativas de login. Tente novamente mais tarde."
            ]);
        }

        if (!Auth::attempt($credentials, true)) {
            RateLimiter::hit($key, 200); 
            return back()->with([
                'error' => 'As credenciais informadas são inválidas. Verifique seus dados e tente novamente.',
            ])->withInput();
        }

        $user = Auth::user();

        if ($user->excluido !== null) {
            
            $this->performLogout($request);

            return back()->with([
                'error' => 'As credenciais informadas são inválidas. Verifique seus dados e tente novamente.',
            ])->withInput();
        }

       $codigo = rand(100000, 999999);

       $user->two_factor_code = $codigo;
       $user->two_factor_expires_at = now()->addMinutes(5);
       $user->save();
       RateLimiter::clear($key);

        try {
            Mail::send('email-login', [
                'codigo' => $codigo, 
                'nome' => $user->nome, 
                'expiracao' => $user->two_factor_expires_at->diffForHumans()
            ], function ($message) use ($request) {
                $message->from('naoresponda@mesal.app.br', 'Mesal Máquinas')
                    ->to($request->email)
                    ->subject('Código de verificação para login');
            });
            
            return redirect()->route('segunda-etapa.form');

        } catch (Exception $e) {
            Log::error('Falha ao enviar e-mail de 2FA: ' . $e->getMessage());
        
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->remember_token = null; 
            $user->save();

            $this->performLogout($request);
        
            return back()->with('error', 'Ocorreu um erro ao enviar o código de verificação para o seu e-mail. Tente novamente mais tarde.');
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) { 
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null; 
            $user->remember_token = null; 
            $user->save();
        }

        $this->performLogout($request);

        return redirect('/login');
    }

    private function performLogout(Request $request)
    {
        Auth::logout(); 
        session()->forget('2fa_passed');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
