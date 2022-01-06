<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Address;
use Toastr;
use Carbon\Carbon;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
class AuthController extends Controller
{
    public function showRegister()
    {
        $s_buyer = Buyer::latest()->get();
        return view('auth.register', ['s_buyer' => $s_buyer]);
    }

    public function register_reseller()
    {
        return view('auth.register_reseller');
    }

    public function register_distributor()
    {
        return view('auth.register_distributor');
    }

    public function register_customer()
    {
        return view('auth.register_customer');
    }

    public function register_buyer(Request $request)
    {
        $this->validate(
            $request,
            [
                'fullname' => 'required|min:3|max:35',
                'email' => 'required|email|unique:users,email',
                'phone_number' =>
                    'required|min:2|max:15|unique:users,phone_number',
                'password' => 'required|confirmed',
                'address_name' => 'required',
            ],
            [
                'required' => 'Wajib Diisi',
                'unique' => 'Sudah Digunakan',
            ]
        );

        $ids_role = 3;
        $user = new User();
        $user->fullname = ucwords(strtolower($request->fullname));
        $user->username = $user->fullname;
        $user->email = strtolower($request->email);
        $user->phone_number = $request->phone_number;
        $user->id_role = $ids_role;
        $user->id_buyer = $request->id_buyer;
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        $s_address = new Address();
        $s_address->address_name = $request->address_name;
        $s_address->id_user = $user->id;
        $s_address->created_at = Carbon::now();
        $s_address->updated_at = Carbon::now();
        $sv_address = $s_address->save();

        if ($simpan && $sv_address) {
            Toastr::success(
                'Success',
                'Register berhasil! Silahkan lakukan verifikasi email'
            );
            $user->sendEmailVerificationNotification();
            return redirect()->route('home.index');
        } else {
            Toastr::error('Error', [
                '' => 'new password cannot be the same as old password',
            ]);
            return redirect()->back();
        }
    }

    public function logins()
    {
        return view('auth.login');
    }

    public function registers(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|min:2|max:15',
            'password' => 'required|confirmed',
        ]);
        $ids_role = 3;
        $user = new User();
        $user->fullname = ucwords(strtolower($request->fullname));
        $user->username = $user->fullname;
        $user->email = strtolower($request->email);
        $user->phone_number = $request->phone_number;
        $user->id_role = $ids_role;
        $user->id_buyer = $request->id_buyer;
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        return redirect()->route('backend.login');
        if ($simpan) {
            Toastr::success(
                'Success',
                'Register berhasil! Silahkan login untuk mengakses data'
            );

            return redirect()->route('backend.login');
        } else {
            Toastr::error('Error', [
                '' => 'new password cannot be the same as old password',
            ]);
            return redirect()->route('registers');
        }

        // if ($user) {
        //     Session::flash(
        //         'success',
        //         'Register berhasil! Silahkan login untuk mengakses data'
        //     );
        //     return redirect()->route('backend.login');
        // } else {
        //     Session::flash('errors', [
        //         '' => 'Register gagal! Silahkan ulangi beberapa saat lagi',
        //     ]);
        //     return redirect()->route('register');
        // }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        Session::flush();
        $request->session()->forget('laravel_session');
        return redirect()->route('login');
    }
}
