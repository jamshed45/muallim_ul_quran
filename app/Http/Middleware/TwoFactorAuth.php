<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !session('two_factor_authenticated')) {
            return redirect()->route('verify.code');
        }

        return $next($request);
    }
}
