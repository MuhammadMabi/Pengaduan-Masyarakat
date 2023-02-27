<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Warga
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->role == 'Warga') {
            return $next($request);
        }else{
            return redirect('dashboard');
        }
    } 
}
