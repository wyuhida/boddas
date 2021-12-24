<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
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
            return redirect()->route('adminlogin');
        }

        if (Auth::user()->id_role == 1) {
            return $next($request);
        }

        if (Auth::user()->id_role == 2) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->id_role == 3) {
            return redirect()->route('buyer.dashboard');
        }
    }
}
