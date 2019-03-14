<?php

namespace App\Http\Controllers;

use App\Models\Paidtenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentRecordsController extends Controller
{
    public function index(){

        $frontendPayments = Paidtenant::where('user_id',Auth::id())->get();

        return view('frontend.paymentrecords',[
            'frontendPayments'=> $frontendPayments
        ]);
    }
}
