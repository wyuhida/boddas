<?php

namespace App\Http\Controllers\Afiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Buyer;

class AfiliateController extends Controller
{
    public function index()
    {
        return view('afiliate.dashboard');
    }
}
