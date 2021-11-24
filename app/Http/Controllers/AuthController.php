<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\User;
use Toastr;
class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
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

        // $messages = [
        //     'fullname.required' => 'Nama Lengkap wajib diisi',
        //     'phone_number.required' => 'Nomor Telepon wajib diisi',
        //     'email.required' => 'Email wajib diisi',
        //     'email.email' => 'Email tidak valid',
        //     'email.unique' => 'Email sudah terdaftar',
        //     'password.required' => 'Password wajib diisi',
        //     'password.confirmed' =>
        //         'Password tidak sama dengan konfirmasi password',
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput($request->all);
        // }

        $user = new User();
        $user->fullname = ucwords(strtolower($request->fullname));
        $user->username = $user->fullname;
        $user->email = strtolower($request->email);
        $user->phone_number = $request->phone_number;
        $user->id_role = '3';
        $user->id_buyer = $request->id_buyer;
        $user->password = Hash::make($request->password);
        // $user->email_verified_at = \Carbon\Carbon::now();
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
        // }
        //  else {
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
