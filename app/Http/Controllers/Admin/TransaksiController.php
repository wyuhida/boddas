<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\News;
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

class TransaksiController extends Controller
{
    public function admin_transaksi()
    {
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
        dd($item);
    }
}
