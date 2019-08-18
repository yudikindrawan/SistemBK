<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && !auth()->user()->hasRole($role)) {
            toastr()->error('Anda tidak memiliki hak akses ke halaman itu! Kasian kamu  ya :(', 'Tak terbayangkan!');
            return redirect()->back();
        }
        return $next($request);
    }
}