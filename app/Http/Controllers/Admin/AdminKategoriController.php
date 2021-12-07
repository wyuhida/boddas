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
use Validator;
use App\Models\Category_Item;
use App\Models\Item;

class AdminKategoriController extends Controller
{
    public function show_admin_kategori()
    {
        $cari = request()->query('cari');
        if ($cari) {
            $s_kat = Category_Item::where([
                ['category_name', 'LIKE', "{$cari}"],
            ])->paginate(10);
        } else {
            $s_kat = DB::table('category__items')->paginate(10);
        }
        return view('admin.kategori.show', ['s_kat' => $s_kat]);
    }

    public function create_admin_kategori()
    {
        return view('admin.kategori.create');
    }

    public function store_admin_kategori(Request $request)
    {
        $this->validate(
            $request,
            [
                'category_name' => 'required |unique:category__items',
            ],
            [
                'unique' => ' Kategori sudah terdaftar',
                'required' => 'Kategori kosong',
            ]
        );

        $ids = auth()->user()->id;

        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $kat = DB::table('category__items')->insert([
            'category_name' => $request->category_name,
            'is_active' => $is_active,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('successfully saved :)', 'Success');
        return redirect()->back();
    }

    public function edit_admin_kategori($id)
    {
        $edit = Category_Item::findOrFail($id);
        return view('admin.kategori.edit', ['edit' => $edit]);
    }

    public function update_admin_kategori(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'category_name' => 'required',
            ],
            [
                'unique' => ' Kategori sudah terdaftar',
                'required' => 'Kategori kosong',
            ]
        );

        $ids = auth()->user()->id;

        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $update = Category_Item::findOrFail($id);
        $update->category_name = $request->category_name;
        $update->is_active = $is_active;
        $update->update_by = $ids;
        $update->updated_at = Carbon::now();
        $update->save();
        Toastr::success('perubahan berhasil di simpan :)', 'Success');
        return redirect()->route('admin.show_admin_kategori');
    }

    public function delete_admin_kategori($id)
    {
        $del = DB::table('category__items')
            ->where('id', $id)
            ->delete();

        Toastr::success('Berhasil hapus:)', 'Success');
        return redirect()->route('admin.show_admin_kategori');
    }
}
