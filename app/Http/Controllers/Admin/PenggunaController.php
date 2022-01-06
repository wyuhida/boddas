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
            $s_show_afiliate = User::join(
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
                    ['buyers.id', 3],
                    ['addresses.address_name', 'LIKE', "{$request->lokasi}%"],
                ])
                ->get();
        } elseif ($cari) {
            $s_show_afiliate = User::join(
                'buyers',
                'users.id_buyer',
                '=',
                'buyers.id'
            )
                ->where([
                    ['users.fullname', 'LIKE', "{$cari}%"],
                    ['buyers.id', 3],
                ])
                ->paginate(20);
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
                    'users.is_active',
                    'addresses.address_name'
                )
                ->where([['buyers.id', '3']])
                ->orderBy('users.id', 'DESC')
                ->get();
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

    public function detail_afiliate($id)
    {
        $profile = User::join('roles', 'users.id_role', '=', 'roles.id')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id', $id)
            ->first();

        $items = DB::table('transaction__details')

            ->join('items', 'transaction__details.id_item', '=', 'items.id')
            ->join('item__contents', 'items.id', 'item__contents.id_item')
            ->join(
                'transactions',
                'transaction__details.id_transaction',
                '=',
                'transactions.id'
            )
            ->join(
                'transaction__statuses',
                'transactions.id_transaction_status',
                '=',
                'transaction__statuses.id'
            )

            ->where([['transactions.id_user', $id]])
            ->orderBy('transaction__details.id', 'DESC')
            ->get();

        $coll = collect($items);
        $newItem = $coll->groupBy('id_transaction')->paginate(10);

        // sum
        $tots = DB::table('transaction__details')
            ->join(
                'transactions',
                'transaction__details.id_transaction',
                '=',
                'transactions.id'
            )
            ->join('users', 'transactions.id_user', '=', 'users.id')
            ->join('items', 'transaction__details.id_item', '=', 'items.id');

        $tot = $tots
            ->select(DB::raw('sum(qty) as total'))
            ->where('users.id', $id)
            ->groupBy('users.id')
            ->first();

        $omzet = $tots
            ->select(DB::raw('SUM(total_price) as omset'))
            ->where('users.id', $id)
            ->groupBy('users.id')
            ->first();

        return view('admin.pengguna.detail_afiliate', [
            'profile' => $profile,
            'newItem' => $newItem,
            'tot' => $tot,
            'omzet' => $omzet,
        ]);
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
                    ['addresses.address_name', 'LIKE', "%{$request->lokasi}%"],
                ])
                ->get();
        } elseif ($cari) {
            $s_show_reseller = User::join(
                'buyers',
                'users.id_buyer',
                '=',
                'buyers.id'
            )
                ->where([
                    ['users.fullname', 'LIKE', "%{$cari}%"],
                    ['buyers.id', 2],
                ])
                ->get();
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
                ->where([['buyers.id', 2]])
                ->orderBy('users.created_at', 'DESC')
                ->get();
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

    public function detail_reseller($id)
    {
        $profile_reseller = User::join(
            'roles',
            'users.id_role',
            '=',
            'roles.id'
        )
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id', $id)
            ->first();

        $items_reseller = DB::table('transaction__details')

            ->join('items', 'transaction__details.id_item', '=', 'items.id')
            ->join('item__contents', 'items.id', 'item__contents.id_item')
            ->join(
                'transactions',
                'transaction__details.id_transaction',
                '=',
                'transactions.id'
            )
            ->join(
                'transaction__statuses',
                'transactions.id_transaction_status',
                '=',
                'transaction__statuses.id'
            )

            ->where([['transactions.id_user', $id]])
            ->orderBy('transaction__details.id', 'DESC')
            ->get();

        $coll = collect($items_reseller);
        $newItemReseller = $coll->groupBy('id_transaction')->paginate(10);

        // sum
        $tot_reseller = DB::table('transaction__details')
            ->join(
                'transactions',
                'transaction__details.id_transaction',
                '=',
                'transactions.id'
            )
            ->join('users', 'transactions.id_user', '=', 'users.id')
            ->join('items', 'transaction__details.id_item', '=', 'items.id');

        $tot_r = $tot_reseller
            ->select(DB::raw('sum(qty) as total'))
            ->where('users.id', $id)
            ->groupBy('users.id')
            ->first();

        $omzet_reseller = $tot_reseller
            ->select(DB::raw('SUM(total_price) as omset'))
            ->where('users.id', $id)
            ->groupBy('users.id')
            ->first();

        return view('admin.pengguna.detail_reseller', [
            'profile_reseller' => $profile_reseller,
            'newItemReseller' => $newItemReseller,
            'tot_r' => $tot_r,
            'omzet_reseller' => $omzet_reseller,
        ]);
    }
}
