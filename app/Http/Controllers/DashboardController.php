<?php

namespace App\Http\Controllers;

use App\Models\Tenantaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $balances = Tenantaccount::where('user_id',Auth::id())->sum('amount');
        return view('frontend.dashboard')->with('balances', $balances);
    }
}
