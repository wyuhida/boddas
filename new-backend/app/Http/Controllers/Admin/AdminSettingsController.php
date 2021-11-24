<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
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
class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function admin_profile_update(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'optionals',
            // 'fullname' => 'optionals',
            // 'username' => 'optionals',
            // 'phone_number' => 'optionals',
            // 'image' => 'image|optionals',
        ]);

        // if ($request->hasFile('image')) {
        //     $resource = $request->file('image');
        //     $names = $resource->getClientOriginalName();
        //     $name = $resource->hashName();
        //     $resource->move(
        //         \base_path() . '/public/img/admin/profile/',
        //         $names
        //     );
        //     $newPath = URL::asset('/admin/profile') . '/';

        //     $file_path = public_path('img/admin/profile') . '/' . $admin->foto;
        //     if (File::exists($file_path)) {
        //         File::delete($file_path); //for deleting only file try this
        //         // $d->delete(); //for deleting record and file try both
        //     }
        // }

        $image = $request->file('image');
        $slug = $request->username;
        $admin = User::findOrFail(Auth::id());

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName =
                $slug .
                '-' .
                $currentDate .
                '-' .
                uniqid() .
                '.' .
                $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }

            if (Storage::disk('public')->exists('profile/' . $admin->image)) {
                Storage::disk('public')->delete('profile/' . $admin->image);
            }
            $profile = Image::make($image)
                ->resize('500,500')
                ->save($imageName);
            Storage::disk('public')->put('profile/' . $imageName, $profile);
        } else {
            $imageName = $admin->image;
        }

        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone_number = $request->phone_number;
        $admin->foto = $imageName;

        $admin->save();
        Toastr::success('successfully saved :)', 'Success');
        //Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect()->back();
    }

    public function admin_password_update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);

                $user->save();
                Toastr::success('Success', 'Password successfully update');
                //Alert::success('Success', 'Password successfully update');
                Auth::logout();
                return redirect()->back();
            } else {
                //Toastr::error('new password cannot be the same as old password','Error');
                Alert::error(
                    'new password cannot be the same as old password',
                    'Error'
                );
                return redirect()->back();
            }
        } else {
            Alert::error('current password not match', 'Error');
            return redirect()->back();
        }
    }
}
