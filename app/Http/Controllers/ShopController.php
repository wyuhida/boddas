<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;
use App\Models\Item_Content;
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

class ShopController extends Controller
{
    public function show_shop()
    {
        $item = Item::join(
            'item__contents',
            'items.id',
            '=',
            'item__contents.id_item'
        )
            ->join(
                'category__items',
                'items.id_category_item',
                '=',
                'category__items.id'
            )
            ->join('users', 'items.update_by', '=', 'users.id')
            ->orderBy('items.id', 'DESC')
            ->get();

        $coll = collect($item);
        $item = $coll->groupBy('id_item')->paginate(8);
        // $sort = $coll->sortByDesc('id_item');
        // $item = $coll->groupBy('id_item')->paginate(8);

        // popular produk
        // $pop = $coll;
        // $filter = $pop->whereNotIn('total_sold', [0]);
        // $popular = $filter->groupBy('id_item');

        return view('pages.shop.show', [
            'item' => $item,
            // 'popular' => $popular,
        ]);
    }

    static function total_diskon()
    {
        if (!empty(Auth::user()->id)) {
            if (Auth::user()->id_role == 3) {
                $persen = Buyer::join(
                    'users',
                    'users.id_buyer',
                    '=',
                    'buyers.id'
                )
                    ->where('users.id', Auth::user()->id)
                    ->select('buyers.*')
                    ->first();
                // $total = $persen['discount_percentage'];
                // $stock_l = $persen['stock_limit'];
                return $persen;
            }
        }
    }

    public function detail_shop($id, $id_category_item)
    {
        $det = DB::table('items')
            ->join('item__contents', 'items.id', '=', 'item__contents.id_item')
            ->join('users', 'items.update_by', '=', 'users.id')
            ->join(
                'category__items',
                'items.id_category_item',
                '=',
                'category__items.id'
            );
        $detail = $det->where([['items.id', $id]])->get();

        $related = DB::table('items')
            ->join('item__contents', 'items.id', '=', 'item__contents.id_item')
            ->join(
                'category__items',
                'items.id_category_item',
                '=',
                'category__items.id'
            )
            ->where('items.id_category_item', $id_category_item)
            ->orderBy('items.id', 'DESC')
            ->get();

        $rel = collect($related);
        $rels = $rel->groupBy('id_item')->take(4);
        return view('pages.shop.detail', [
            'detail' => $detail,
            'rels' => $rels,
        ]);
    }

    public function add_cart(Request $request)
    {
        if (empty(Auth::user()->id)) {
            return redirect()->route('backend.login');
        }
        $ids = auth()->user()->id;
        $qty = $request->quantity;
        $diskon = $request->diskon;
        $id_item = $request->id_item;
        $limit = $request->limit;
        $harga_default = $request->harga_default;

        if ($qty >= $limit) {
            $harga_dis = $diskon * $qty; // harga jika sesuai limit
        } else {
            $harga_dis = $harga_default * $qty; // harga default
        }

        $transaksi = DB::table('transactions')->insertGetId([
            'id_user' => $ids,
            'id_transaction_status' => 2,
            'total_price' => $harga_dis,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'image' => '',
        ]);

        $trans_det = DB::table('transaction__details')->insert([
            'id_transaction' => $transaksi,
            'qty' => $request->quantity,
            'id_item' => $id_item,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('show_cart');
    }

    public function show_cart(Request $request)
    {
        if (empty(Auth::user()->id)) {
            return redirect()->route('backend.login');
        }
        $ids = auth()->user()->id;
        $s_cart = DB::table('transaction__details')
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
            ->where([
                ['transactions.id_user', $ids],
                ['transaction__statuses.id', 2],
            ])
            ->orderBy('transaction__details.id', 'DESC')
            ->first();

        $cek_alamat = User::join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->join('addresses', 'users.id', '=', 'addresses.id_user')
            ->where([['users.id', $ids], ['addresses.id_user', $ids]])
            ->orderBy('addresses.id', 'DESC')
            ->first();

        return view('pages.shop.show_cart', [
            's_cart' => $s_cart,
            'cek_alamat' => $cek_alamat,
        ]);
    }

    public function proses_pembayaran(Request $request)
    {
        $this->validate(
            $request,
            [
                'alamat' => 'required',
                'phone_number' => 'required',
                'foto' => 'required',
            ],
            [
                'required' => 'Wajib Isi',
            ]
        );
        $ids = auth()->user()->id;
        $id_transaction = $request->id_transaction;
        $id_item = $request->id_item;
        $qty = $request->qty;

        // cek total
        $stok = Item::where('id', $id_item)
            ->select('total_stock')
            ->first();
        $new_stok = $stok['total_stock'];
        $total_stok = $new_stok - $qty;

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
                $updt_status = DB::table('transactions')
                    ->where('id', $id_transaction)
                    ->update([
                        'image' => $name,
                        'id_transaction_status' => 1,
                    ]);

                $updt_stock = Item::findOrFail($id_item);
                $updt_stock->total_stock = $total_stok;
                $updt_stock->total_sold = $qty;
                $updt_stock->save();

                $updt_address = DB::table('addresses')
                    ->where('id_user', $ids)
                    ->update([
                        'address_name' => $request->alamat,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                $updt_phone = User::findOrFail($ids);
                $updt_phone->phone_number = $request->phone_number;
                $updt_phone->save();
            }
        }

        $updt_address = Address::where('id_user', $ids)->first();
        if (!empty($updt_address)) {
            Address::where('id_user', $ids)->update([
                'address_name' => $request->alamat,
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Address::insert([
                'address_name' => $request->alamat,
                'is_default' => 1,
                'id_user' => $ids,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // $updt_address->address_name = $request->alamat;
        // $updt_address->created_at = Carbon::now();
        // $updt_address->updated_at = Carbon::now();

        // if (!empty($updt_address)) {
        //     dd($updt_address);
        // }

        $updt_phone = User::findOrFail($ids);
        $updt_phone->phone_number = $request->phone_number;
        $updt_phone->save();

        Toastr::success('Success', 'Pesanan terkirim');
        return redirect()->route('home.index');
    }

    public function remove_cart($id)
    {
        Transaction::destroy($id);
        Toastr::success('Success', 'Produk dihapus');
        return redirect()->route('home.index');
    }
}
