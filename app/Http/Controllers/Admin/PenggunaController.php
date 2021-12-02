<?php

namespace App\Http\Controllers\Admin;

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

class PenggunaController extends Controller
{
    public function show_admin_afiliate()
    {
        $ids = auth()->user()->id;
        return view('admin.pengguna.show_afiliate');
    }

    public function edit_admin_afiliate()
    {
    }

    public function update_admin_afiliate()
    {
    }
}
