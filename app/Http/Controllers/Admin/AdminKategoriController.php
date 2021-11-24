<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use File;
use Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;
use Carbon\Carbon;
use Image;
use Storage;
use Session;
use Cookie;
use DB;

class AdminKategoriController extends Controller
{
    public function show_admin_kategori()
    {
        $show = DB::table('category__items')->get();
        return view('admin.kategori.show', ['s_produk' => $show]);
    }

    public function create_admin_kategori()
    {
        return view('admin.kategori.create');
    }

    public function store_admin_kategori(Request $request)
    {
        $this->validate($request, [
            'category_name' => ['required', 'unique:category__items'],
        ]);
        $ids = auth()->user()->id;

        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $save = DB::table('category__items')->insert([
            'category_name' => $request->category_name,
            'is_active' => $is_active,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('successfully saved :)', 'Success');
        return redirect()->back();
    }
}
