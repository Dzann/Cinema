<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->role == 'admin') {
                    # code...
                    return redirect()->route('homeadmin')->with('message', 'Akses ditolak');
                } elseif (auth()->user()->role == 'user') {
                    # code...
                    return redirect()->route('movie')->with('message', 'Akses ditolak');
                } else {
                    return redirect()->route('owner.dashboard')->with('message', 'Akses ditolak');
                }
            }
        }

        return $next($request);
    }
}
