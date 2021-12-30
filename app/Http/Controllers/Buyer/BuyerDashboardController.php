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
            ->join('users', 'transactions.id_user', '=', 'users.id')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where([['transactions.id_user', $ids]])
            ->orderBy('transaction__details.id', 'DESC')
            ->get();

        $profile = User::leftJoin('roles', 'users.id_role', '=', 'roles.id')
            ->select(
                'users.id',
                'users.id_role',
                'users.fullname',
                'users.username',
                'users.email',
                'users.foto',
                'users.phone_number',
                'users.is_active',
                'users.id_buyer',
                'buyers.buyer',
                'buyers.id',
                'buyers.stock_limit',
                'buyers.discount_percentage',
                'addresses.address_name'
            )
            ->leftJoin('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->leftJoin('addresses', 'users.id', '=', 'addresses.id_user')
            ->where('users.id', $ids)
            ->first();

        $coll = collect($items);
        $newItem = $coll->groupBy('id_transaction')->paginate(10);
        // $total = $it[0]->total_price * $cou;

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
            ->select(DB::raw('sum(total_price) as total'))
            ->where('users.id', $ids)
            ->groupBy('users.id')
            ->first();

        return view('buyer.dashboard', [
            'newItem' => $newItem,
            'profile' => $profile,
            'tot' => $tot,
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
        $this->validate(
            $request,
            [
                'fullname' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'address_name' => 'required',
            ],
            [
                'fullname.required' => 'Nama Wajib Isi',
                'phone_number.required' => 'Nomor HP Wajib Isi',
                'email.required' => 'Email Wajib Isi',
                'address_name.required' => 'Alamat Wajib Isi',
            ]
        );
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
        $this->validate(
            $request,
            [
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ],
            [
                'old_password.confirmed' => 'Password Tidak Sama',
            ]
        );
        $ids = auth()->user()->id;
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Success', 'Password Berhasil Diubah');
                Auth::logout();
                return redirect()->route('backend.login');
            } else {
                //Toastr::error('new password cannot be the same as old password','Error');
                Alert::error('Password Baru Tidak Boleh Sama', 'Error');
                return redirect()->back();
            }
        } else {
            Alert::error('Password Tidak Sama', 'Error');
            return redirect()->back();
        }
    }
}
