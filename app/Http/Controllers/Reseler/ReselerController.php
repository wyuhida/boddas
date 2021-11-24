<?php

namespace App\Http\Controllers\Reseler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReselerController extends Controller
{
    public function index()
    {
        return view('reseler.dashboard');
    }
}
