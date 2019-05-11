<?php

namespace App\Http\Controllers;

use App\Models\Paidtenant;
use App\Models\Tenantaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $balances = Paidtenant::where('user_id',Auth::id())->sum('balance');
        return view('frontend.dashboard')->with('balances', $balances);
    }
}
