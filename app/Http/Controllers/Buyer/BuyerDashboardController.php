<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
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
class BuyerDashboardController extends Controller
{
    public function index()
    {
        $ids = auth()->user()->id;
        $dashboard = User::join('roles', 'users.id_role', '=', 'roles.id')
            ->join('buyers', 'users.id_buyer', '=', 'buyers.id')
            ->where('users.id', $ids)
            ->first();
        return view('buyer.dashboard', ['dashboard' => $dashboard]);
    }
}
