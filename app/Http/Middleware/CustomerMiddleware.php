<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CustomerMiddleware
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
        // if (
        //     Auth::check() &&
        //     Auth::user()->id_role == 3 &&
        //     Auth::user()->id_buyer == 1
        // ) {
        //     return $next($request);
        // } else {
        //     return redirect()->route('login');
        // }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->id_role == 1) {
            return redirect()->route('superadmin.dashboard');
        }

        if (Auth::user()->id_role == 2) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->id_role == 3 && Auth::user()->id_buyer == 1) {
            return $next($request);
        }

        if (Auth::user()->id_role == 3 && Auth::user()->id_buyer == 2) {
            return redirect()->route('reseler.reseler.dashboard');
        }

        if (Auth::user()->id_role == 3 && Auth::user()->id_buyer == 3) {
            return redirect()->route('afiliate.afiliate.dashboard');
        }
    }
}
