<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas;
use App\Models\transaksiModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('main.dashboard');
    }
}
