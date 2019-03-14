<?php

namespace App\Http\Controllers;

use App\Tenantaccount;
use App\Tenantmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadmessageController extends Controller
{
    public function index(){

        $reads = Tenantmessage::where('user_id',Auth::id())->get();
        return view('frontend.readmessage')->with('reads',$reads);
    }
}
