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
use Session;
use Cookie;

class BuyerDiskonController extends Controller
{
    public function show_buyer_diskon()
    {
        $s_buyer = Buyer::latest()->get();
        return view('admin.buyer.show', ['s_buyer' => $s_buyer]);
    }
    public function create_buyer_diskon(Request $request)
    {
        return view('admin.buyer.create');
    }
    public function store_buyer_diskon(Request $request)
    {
        $this->validate(
            $request,
            [
                'buyer' => 'required',
                'stock_limit' => 'required|numeric|min:1',
                'target_penjualan' => 'required|numeric|min:1',
            ],
            [
                'buyer.required' => 'Nama Wajib Diisi',
                'stock_limit.required' =>
                    'Minimal Stok Wajib Diisi dan Minimal 1',
                'target_penjualan.required' =>
                    'target penjualan Wajib Diisi dan Minimal 1',
                'numeric' => 'inputan harus angka',
            ]
        );

        $disc = $request->discount_percentage;
        if (empty($disc)) {
            $diskon = 0.0;
        } else {
            $diskon = $disc;
        }
        $sv_buyer_diskon = new Buyer();
        $sv_buyer_diskon->buyer = $request->buyer;
        $sv_buyer_diskon->stock_limit = $request->stock_limit;
        $sv_buyer_diskon->discount_percentage = $diskon;
        $sv_buyer_diskon->target_penjualan = $request->target_penjualan;
        $sv_buyer_diskon->save();
        Toastr::success('Berhasi Disimpan :)', 'Success');
        return redirect()->route('admin.show_buyer_diskon');
    }
    public function edit_buyer_diskon($id)
    {
        $e_buyer_diskon = Buyer::findOrFail($id);
        return view('admin.buyer.edit', ['e_buyer_diskon' => $e_buyer_diskon]);
    }
    public function update_buyer_diskon(Request $request, $id)
    {
        $ids = auth()->user()->id;

        $this->validate(
            $request,
            [
                'buyer' => 'required',
                'stock_limit' => 'required|numeric|min:1',
                'target_penjualan' => 'required|numeric|min:1',
            ],
            [
                'buyer.required' => 'Nama Wajib Diisi',
                'stock_limit.required' =>
                    'Minimal Stok Wajib Diisi dan Minimal 1',
                'target_penjualan.required' =>
                    'target penjualan Wajib Diisi dan Minimal 1',
                'numeric' => 'inputan harus angka',
            ]
        );

        $disc = $request->discount_percentage;
        if (empty($disc)) {
            $diskon = 0.0;
        } else {
            $diskon = $disc;
        }
        $up_buyer_diskon = Buyer::find($id);
        $up_buyer_diskon->buyer = $request->buyer;
        $up_buyer_diskon->stock_limit = $request->stock_limit;
        $up_buyer_diskon->discount_percentage = $diskon;
        $up_buyer_diskon->target_penjualan = $request->target_penjualan;
        $up_buyer_diskon->update_by = $ids;
        $up_buyer_diskon->created_at = Carbon::now();
        $up_buyer_diskon->updated_at = Carbon::now();
        $up_buyer_diskon->save();
        Toastr::success('Berhasi Diubah :)', 'Success');
        return redirect()->route('admin.show_buyer_diskon');
    }
    public function delete_buyer_diskon($id)
    {
        $ck_usr = User::join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id_buyer', $id)
            ->first();
        if ($ck_usr != null) {
            Toastr::error('Pengguna sudah digunakan', 'Error');
            return redirect()->back();
        }
        $del = Buyer::findOrFail($id);
        $del->delete();
        Toastr::success('Berhasi Dihapus :)', 'Success');
        return redirect()->route('admin.show_buyer_diskon');
    }
}
