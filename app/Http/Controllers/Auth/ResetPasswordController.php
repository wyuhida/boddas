<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use App\Models\Buyer;
use Auth;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // for email
    protected function redirectTo()
    {
        // if (Auth()->user()->id_role == 1) {
        //     return route('superadmin.dashboard');
        // } elseif (Auth()->user()->id_role == 2) {
        //     return route('superadmin.dashboard');
        // }

        if (
            (Auth()->user()->id_role == 1 && Auth()->user()->id_buyer == 0) ||
            ''
        ) {
            return route('superadmin.dashboard');
        }
        if (
            (Auth()->user()->id_role == 2 && Auth()->user()->id_buyer == 0) ||
            ''
        ) {
            return route('admin.dashboard');
        }

        if (
            (Auth()->user()->id_role == 3 && Auth()->user()->id_buyer == 1) ||
            ''
        ) {
            return route('customer.customer.dashboard');
        }

        if (
            (Auth()->user()->id_role == 3 && Auth()->user()->id_buyer == 2) ||
            ''
        ) {
            return route('reseler.reseler.dashboard');
        }

        if (
            (Auth()->user()->id_role == 3 && Auth()->user()->id_buyer == 3) ||
            ''
        ) {
            return route('afiliate.afiliate.dashboard');
        }
    }
}
