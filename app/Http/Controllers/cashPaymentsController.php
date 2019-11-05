<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomExeption;
use App\Finalreport;
use App\Models\Lease;
use App\Models\Paidtenant;
use App\Models\Tenantaccount;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class cashPaymentsController extends Controller
{
    public function index(){
        $tenants = Lease::all();
        $paidTenants = Paidtenant::orderByDesc('id')->get();
        return view('backend.cashBankPayments',[
            'tenants'=>$tenants,
            'paidTenants'=>$paidTenants
        ]);
    }
    public function leaseDetails($id){
        $lease = Lease::where('id',$id)->with(['user','propertyunit.property'])->first();

        return response()->json($lease);
    }



    public function store(Request $request){

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'amount' => ['required'],
            'lease_id' => ['required'],
            'bill' => ['required'],
            'payment_mode' => ['required'],


        ]);
        if ($validator->fails()) {
            return redirect(url('admin/error'))
                ->withErrors($validator)
                ->withInput();
        }
        $payments = new Paidtenant();

        $payments->user_id = $request->user_id;
        $payments->lease_id = $request->lease_id;
        $payments->bill = $request->bill;
        $payments->amount = $request->amount;
        $payments->payment_mode = $request->payment_mode;
        $payments->property_id = $request->property_id;
        $payments->transaction_type = 'PAID';

        $verification = Tenantaccount::where('lease_id',$payments->lease->id)->first();
        if (!$verification){
            return view('backend.billingError');
        }
        $payments->save();


        $store = new Finalreport();

        $store->user_id = $request->user_id;
        $store->lease_id = $request->lease_id;
        $store->amount = $request->amount;
        $store->property_id = $request->property_id;
        $store->transaction_type = 'debit';
        $store->save();

        $total = 0;

        $findBalaces = Tenantaccount::where('lease_id',$payments->lease->id)->get();
        $findPaids = Paidtenant::where('lease_id',$payments->lease->id)->get();
        foreach ($findBalaces as $findBalace)
            $total = $findBalace->amount;
        foreach ($findPaids as $findPaid)
            $totalTwo = $findPaid->amount;

        $totalBalance = $total - $totalTwo;
        DB::table('paidtenants')->where('lease_id',"=", $payments->lease_id)->latest()->update(['balance'=>($totalBalance)]);


        DB::table('tenantaccounts')->where('lease_id','=',$payments->lease_id)->Where('amount','<=',$payments->amount)->delete();
        DB::table('tenantaccounts')->where('lease_id','=', $payments->lease_id)->Where('amount','>',$payments->amount)->update(['amount'=>($totalBalance)]);
//        print_r($totalBalance);die;

            Session::flash('success', 'Payment successfully Processed!!');


        return redirect('admin/cashBank');

    }

}
