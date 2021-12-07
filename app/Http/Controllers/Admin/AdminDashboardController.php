<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Item_Content;
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

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $ids = auth()->user()->id;
        // $total_penjualan = DB::table('items')
        //     ->select('total_sold', DB::raw('SUM(total_sold) as total'))
        //     ->groupBy('update_by', $ids)
        //     ->get();

        $total_penjualan = DB::table('items')
            ->where('update_by', $ids)
            ->sum('total_sold');

        $total_reseler = DB::table('users')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id_buyer', 2)
            ->count();
        $total_customer = DB::table('users')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id_buyer', 1)
            ->count();

        $total_afiliate = DB::table('users')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id_buyer', 3)
            ->count();
        $omzet = DB::table('items')
            ->select(DB::raw('SUM(price*total_sold) as total'))
            ->get();

        $p_favorite = Item::join(
            'item__contents',
            'items.id',
            '=',
            'item__contents.id_item'
        )
            ->orderBy('total_sold', 'desc')
            ->where('items.update_by', $ids)
            ->limit(5)
            ->get()
            ->groupBy('item_name');

        // $coll = collect($p_favorite);
        // $p_favorite = $coll->groupBy('id_item');

        return view('admin.dashboard', [
            'total_penjualan' => $total_penjualan,
            'total_reseler' => $total_reseler,
            'total_afiliate' => $total_afiliate,
            'total_customer' => $total_customer,
            'omzet' => $omzet,
            'p_favorite' => $p_favorite,
        ]);
    }
}
