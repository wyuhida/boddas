<?php

namespace App\Http\Controllers\SuperAdmin;

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

class UsersActivityController extends Controller
{
    /**
     *  ADMIN
     */
    public function show_user_admin()
    {
        $show_admin = User::where('id_role', 2)->get();

        $cari = request()->query('cari');
        if ($cari) {
            $show_admin = User::where('fullname', 'LIKE', "%{$cari}%")->get();
        }
        return view('superadmin.admin.show', ['show_admin' => $show_admin]);
    }

    public function create_user_admin()
    {
        return view('superadmin.admin.create');
    }

    public function store_user_admin(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'fullname' => ['required', 'string'],
            'phone_number' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $ids = auth()->user()->id;
        if ($request->status) {
            $status = 1;
        } else {
            $status = 0;
        }
        $s_admin = new User();
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/profile/', $name);
            $newPath = URL::asset('/image/profile') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $s_admin->id_role = 2;
                $s_admin->foto = $name;
                $s_admin->fullname = $request->fullname;
                $s_admin->username = $request->fullname;
                $s_admin->email = $request->email;
                $s_admin->password = Hash::make($request->password);
                $s_admin->phone_number = $request->phone_number;
                $s_admin->update_by = $ids;
                $s_admin->is_active = $status;
                $s_admin->created_at = Carbon::now();
                $s_admin->updated_at = Carbon::now();
                $s_admin->save();
            }
        } else {
            $s_admin->id_role = 2;
            $s_admin->fullname = $request->fullname;
            $s_admin->username = $request->fullname;
            $s_admin->email = $request->email;
            $s_admin->password = Hash::make($request->password);
            $s_admin->phone_number = $request->phone_number;
            $s_admin->update_by = $ids;
            $s_admin->is_active = $status;
            $s_admin->created_at = Carbon::now();
            $s_admin->updated_at = Carbon::now();
            $s_admin->save();
        }
        Toastr::success('Success', 'save success');
        return redirect()->back();
    }

    public function edit_user_admin($id)
    {
        $edit_admin = User::find($id);
        return view('superadmin.admin.edit', ['edit_admin' => $edit_admin]);
    }
    public function update_user_admin(Request $request, $id)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'fullname' => ['required', 'string'],
            'phone_number' => ['required'],
        ]);

        $update_admin = User::find($id);
        $ids = auth()->user()->id;
        if ($request->status) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/profile/', $name);
            $newPath = URL::asset('/image/profile') . '/';
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                foreach ($update_admin as $key => $imgs) {
                    $file_path =
                        public_path('image/profile') .
                        '/' .
                        $update_admin->foto;
                    if (File::exists($file_path)) {
                        File::delete($file_path); //for deleting only file try this
                        // $d->delete(); //for deleting record and file try both
                    }
                }
                $update_admin->id_role = 2;
                $update_admin->foto = $name;
                $update_admin->fullname = $request->fullname;
                $update_admin->username = $request->fullname;
                $update_admin->email = $request->email;
                $update_admin->phone_number = $request->phone_number;
                $update_admin->update_by = $ids;
                $update_admin->is_active = $status;
                $update_admin->updated_at = Carbon::now();
                $update_admin->save();
            }
        } else {
            $update_admin->id_role = 2;
            $update_admin->fullname = $request->fullname;
            $update_admin->username = $request->fullname;
            $update_admin->email = $request->email;
            $update_admin->phone_number = $request->phone_number;
            $update_admin->update_by = $ids;
            $update_admin->is_active = $status;
            $update_admin->updated_at = Carbon::now();
            $update_admin->save();
        }
        Toastr::success('Success', 'save success');
        return redirect()->back();
    }
    public function delete_user_admin($id)
    {
        $delete_admin = User::findOrFail($id);
        foreach ($delete_admin as $del_imgs) {
            $file_path =
                public_path('image/profile') . '/' . $delete_admin->foto;
            if (File::exists($file_path)) {
                File::delete($file_path); //for deleting only file try this
                // $d->delete(); //for deleting record and file try both
            }
        }
        $delete_admin->delete();
        if ($delete_admin) {
            Toastr::success('Success', 'save success');
            return redirect()->back();
        } else {
            Toastr::error('Error', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }
}
