<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\News;
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

class BlogController extends Controller
{
    public function show_superadmin_blog()
    {
        $show_blog = News::all();

        $cari = request()->query('cari');
        if ($cari) {
            $show_blog = News::where('title', 'LIKE', "%{$cari}%")->get();
        }
        return view('superadmin.blog.show', ['show_blog' => $show_blog]);
    }

    public function create_superadmin_blog()
    {
        return view('superadmin.blog.create');
    }

    public function store_superadmin_blog(Request $request)
    {
        $ids = auth()->user()->id;

        $this->validate($request, [
            'title' => ['required', 'unique:news'],
        ]);
        $add_artikel = new News();
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/artikel/', $name);
            $newPath = URL::asset('/image/artikel') . '/';
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                foreach ($add_artikel as $key => $imgs) {
                    $file_path =
                        public_path('image/artikel') .
                        '/' .
                        $add_artikel->thumbnail;
                    if (File::exists($file_path)) {
                        File::delete($file_path); //for deleting only file try this
                        // $d->delete(); //for deleting record and file try both
                    }
                }
                $add_artikel->title = $request->title;
                $add_artikel->thumbnail = $name;
                $add_artikel->body_news = $request->body;
                $add_artikel->id_user = $ids;
                $add_artikel->update_by = $ids;
                $add_artikel->created_at = Carbon::now();
                $add_artikel->updated_at = Carbon::now();
                $add_artikel->save();
            }
        } else {
            $add_artikel->title = $request->title;
            $add_artikel->body_news = $request->body;
            $add_artikel->id_user = $ids;
            $add_artikel->update_by = $ids;
            $add_artikel->created_at = Carbon::now();
            $add_artikel->updated_at = Carbon::now();
            $add_artikel->save();
        }
        Toastr::success('Success', 'save success');
        return redirect()->back();
    }
    public function edit_superadmin_blog($id)
    {
        $edit_blog = News::find($id);
        return view('superadmin.blog.edit', ['edit_blog' => $edit_blog]);
    }

    public function update_superadmin_blog(Request $request, $id)
    {
        $ids = auth()->user()->id;

        $this->validate($request, [
            'title' => ['required'],
            'body' => ['required'],
        ]);
        $update_artikel = News::find($id);

        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/artikel/', $name);
            $newPath = URL::asset('/image/artikel') . '/';
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                foreach ($update_artikel as $key => $imgs) {
                    $file_path =
                        public_path('image/artikel') .
                        '/' .
                        $update_artikel->thumbnail;
                    if (File::exists($file_path)) {
                        File::delete($file_path); //for deleting only file try this
                        // $d->delete(); //for deleting record and file try both
                    }
                }
                $update_artikel->title = $request->title;
                $update_artikel->thumbnail = $name;
                $update_artikel->body_news = $request->body;
                $update_artikel->id_user = $ids;
                $update_artikel->update_by = $ids;
                $update_artikel->created_at = Carbon::now();
                $update_artikel->updated_at = Carbon::now();
                $update_artikel->save();
            }
        } else {
            $update_artikel->title = $request->title;
            $update_artikel->body_news = $request->body;
            $update_artikel->id_user = $ids;
            $update_artikel->update_by = $ids;
            $update_artikel->created_at = Carbon::now();
            $update_artikel->updated_at = Carbon::now();
            $update_artikel->save();
        }

        Toastr::success('Success', 'save success');
        return redirect()->back();
    }
    public function detail_superadmin_blog($id)
    {
        $detail = News::find($id);
        return view('superadmin.blog.detail', ['detail' => $detail]);
    }

    public function delete_superadmin_blog($id)
    {
        $delete = News::find($id);
        foreach ($delete as $key => $imgs) {
            $file_path =
                public_path('image/artikel') . '/' . $delete->thumbnail;
            if (File::exists($file_path)) {
                File::delete($file_path); //for deleting only file try this
                // $d->delete(); //for deleting record and file try both
            }
        }
        $delete->delete();
        if ($delete) {
            Toastr::success('Success', 'save success');
            return redirect()->back();
        } else {
            Toastr::error('Error', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }
}
