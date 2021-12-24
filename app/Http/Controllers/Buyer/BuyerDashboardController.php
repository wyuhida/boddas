<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Buyer;
use App\Models\Transaction_Status;
use App\Models\Transaction_Detail;
use App\Models\Transaction;
use App\Models\Address;
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
use Spatie\CollectionMacros\Macros;
use Illuminate\Pagination\LengthAwarePaginator;
class BuyerDashboardController extends Controller
{
    public function index()
    {
        $ids = auth()->user()->id;
        $dashboard = User::join('roles', 'users.id_role', '=', 'roles.id')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id', $ids)
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
            ->where([['transactions.id_user', $ids]])
            ->orderBy('transaction__details.id', 'DESC')
            ->get();

        $coll = collect($items);
        $newItem = $coll->groupBy('id_transaction')->paginate(10);

        return view('buyer.dashboard', [
            'dashboard' => $dashboard,
            'newItem' => $newItem,
        ]);
    }

    public function update_pembayaran(Request $request, $id)
    {
        if (isset($request->foto)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('foto');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/pembayaran/', $name);
            $newPath = URL::asset('/image/pembayaran') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $updt_status = Transaction::findOrFail($id);
                $updt_status->image = $name;
                $updt_status->id_transaction_status = 1;
                $updt_status->save();
                Toastr::success('Success', 'Unggah terkirim');
                return redirect()->back();
            } else {
                Toastr::error('Error', 'Unggah tidak berhasil');
                return redirect()->back();
            }
        }
        $id_itm = Transaction::where('id', $id)
            ->select('id_item')
            ->get();
        dd($id_itm);
    }

    public function profile(Request $request)
    {
        $ids = auth()->user()->id;
        $profile = User::join('roles', 'users.id_role', '=', 'roles.id')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->join('addresses', 'users.id', '=', 'addresses.id_user')
            ->where('users.id', $ids)
            ->first();

        return view('buyer.profile', ['profile' => $profile]);
    }

    public function update_image_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (isset($request->foto)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('foto');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/profile', $name);
            $newPath = URL::asset('/image/profile') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $user->foto = $name;
                $user->save();
                Toastr::success('Success', 'Unggah berhasil');
                return redirect()->back();
            }
        }
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fullname = $request->fullname;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->save();

        $updt_address = Address::where('id_user', $id);
        $updt_address->update([
            'address_name' => $request->address_name,
        ]);

        Toastr::success('Success', 'Ubah berhasil');
        return redirect()->back();
    }

    public function update_katasandi(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $ids = auth()->user()->id;
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Success', 'Password successfully update');
                Auth::logout();
                return redirect()->route('backend.login');
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
