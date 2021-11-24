<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
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

        // $total_reseler = DB::table('buyers')
        //     ->join('users', 'buyers.id', '=', 'users.id_buyer')
        //     ->where('users.id_buyer', 3)
        //     ->where('buyer.id', 2)
        //     ->get();
        // dd($total_reseler);

        return view('admin.dashboard', [
            'total_penjualan' => $total_penjualan,
            'total_reseler' => $total_reseler,
        ]);
    }
}
