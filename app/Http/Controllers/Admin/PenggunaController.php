<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Buyer;
use Auth;
use Illuminate\Support\Facades\URL;
use DB;
use File;
use Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;
use Carbon\Carbon;
use Image;
use Storage;
use Session;
use Cookie;

class PenggunaController extends Controller
{
    /**
     * AFILIATE
     */
    public function show_admin_afiliate(Request $request)
    {
        $ids = auth()->user()->id;

        $cari = request()->query('cari');

        if (isset($request->lokasi)) {
            $s_show_afiliate = User::leftJoin(
                'buyers',
                'buyers.id',
                '=',
                'users.id_buyer'
            )
                ->leftJoin('addresses', 'users.id', '=', 'addresses.id_user')
                ->select(
                    'users.id',
                    'users.fullname',
                    'users.id',
                    'users.is_active',
                    'addresses.*'
                )
                ->where([
                    ['users.id_role', '=', 3],
                    ['buyers.buyer', 'afiliate'],
                    ['addresses.address_name', 'LIKE', "{$request->lokasi}"],
                ])
                ->paginate(20);
        } elseif ($cari) {
            $s_show_afiliate = User::where([
                ['fullname', 'LIKE', "{$cari}"],
                ['id_role', '=', 3],
            ])->paginate(20);
        } else {
            $s_show_afiliate = User::leftJoin(
                'buyers',
                'buyers.id',
                '=',
                'users.id_buyer'
            )
                ->leftJoin('addresses', 'users.id', '=', 'addresses.id_user')
                ->select(
                    'users.id',
                    'users.fullname',
                    'users.id',
                    'users.is_active'
                )
                ->where([
                    ['users.id_role', '=', 3],
                    ['buyers.buyer', 'afiliate'],
                ])
                ->orderBy('users.created_at', 'DESC')
                ->paginate(20);
        }

        return view('admin.pengguna.show_afiliate', [
            's_show_afiliate' => $s_show_afiliate,
        ]);
    }

    public function ubah_status(Request $request)
    {
        $ids = auth()->user()->id;

        $user = User::find($request->user_id);
        $user->is_active = $request->status;
        $user->save();
        Toastr::success('successfully saved :)', 'Success');
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function edit_admin_afiliate()
    {
    }

    public function update_admin_afiliate()
    {
    }

    /**
     * RESELLER
     */

    public function show_admin_reseller(Request $request)
    {
        $ids = auth()->user()->id;

        $cari = request()->query('cari');

        if (isset($request->lokasi)) {
            $s_show_reseller = User::join(
                'buyers',
                'buyers.id',
                '=',
                'users.id_buyer'
            )
                ->join('addresses', 'users.id', '=', 'addresses.id_user')
                ->select(
                    'users.id',
                    'users.fullname',
                    'users.id',
                    'users.is_active',
                    'addresses.*'
                )
                ->where([
                    ['users.id_role', '=', 3],
                    ['buyers.buyer', 'reseller'],
                    ['addresses.address_name', 'LIKE', "{$request->lokasi}"],
                ])
                ->paginate(20);
        } elseif ($cari) {
            $s_show_reseller = User::where(
                'fullname',
                'LIKE',
                "{$cari}"
            )->paginate(20);
        } else {
            $s_show_reseller = User::leftJoin(
                'buyers',
                'buyers.id',
                '=',
                'users.id_buyer'
            )
                ->leftJoin('addresses', 'users.id', '=', 'addresses.id_user')
                ->select(
                    'users.id',
                    'users.fullname',
                    'users.id',
                    'users.is_active',
                    'addresses.address_name'
                )
                ->where([['buyers.buyer', 'reseler']])
                ->orderBy('users.created_at', 'DESC')
                ->paginate(20);
        }

        return view('admin.pengguna.show_reseller', [
            's_show_reseller' => $s_show_reseller,
        ]);
    }

    public function ubah_status_reseller(Request $request)
    {
        $ids = auth()->user()->id;

        $user = User::find($request->user_id);
        $user->is_active = $request->status;
        $user->save();
        Toastr::success('successfully saved :)', 'Success');
        return response()->json(['success' => 'Status change successfully.']);
    }
}
