<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->two_factor_code && !session('2fa_passed')) {
            return redirect()->route('segunda-etapa.form');
        }

        return $next($request);
    }
}
