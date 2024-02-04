<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$allowedRoles)
    {
        $user = Auth::user();

        // Periksa apakah pengguna memiliki salah satu dari peran yang diizinkan
        if ($user && in_array($user->role, $allowedRoles)) {
            return $next($request);
        }

        // Tidak diizinkan, redirect atau berikan respon sesuai kebijakan Anda
        return redirect()->route('movie')->with('error', 'Akses Ditolak');
    }
}
