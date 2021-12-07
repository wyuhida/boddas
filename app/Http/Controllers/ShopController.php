<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;
use App\Models\Item_Content;
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
            ->join('users', 'items.update_by', '=', 'users.id')
            ->get();

        $coll = collect($item);
        $item = $coll->groupBy('id_item');
        return view('pages.shop.show', ['item' => $item]);
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
                return $total = $persen['discount_percentage'];
            }
        }
    }

    public function detail_shop($id)
    {
        $detail = DB::table('items')
            ->join('item__contents', 'items.id', '=', 'item__contents.id_item')
            ->join('users', 'items.update_by', '=', 'users.id')
            ->where('items.id', $id)
            ->get();
        return view('pages.shop.detail', ['detail' => $detail]);
    }
}
