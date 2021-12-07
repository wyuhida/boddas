<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class BuyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->id_role == 1) {
            return redirect()->route('superadmin.dashboard');
        }

        if (Auth::user()->id_role == 2) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->id_role == 3) {
            return $next($request);
        }
    }
}
