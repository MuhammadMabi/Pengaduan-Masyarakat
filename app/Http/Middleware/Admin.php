<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->role == 'Admin') {
            return $next($request);
        }else{
            Alert::warning('Anda Tidak Berhak Mengakses Halaman Ini');
            return redirect()->back();
        }
    } 
}
