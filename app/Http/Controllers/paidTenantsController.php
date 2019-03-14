<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Paidtenant;
use App\Models\Tenantaccount;
use Illuminate\Http\Request;

class paidTenantsController extends Controller
{
    public function index(){

        $bills = Tenantaccount::where('transaction_type','debit')->get();
//        print_r($bills);die;

        return view('paidTenants.index')->with('bills',$bills);
    }

}
