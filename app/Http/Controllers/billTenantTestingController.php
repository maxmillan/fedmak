<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Lease;
use App\Models\Paidtenant;
use App\Models\Propertyunitservicebill;
use App\Models\Tenantaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class billTenantTestingController extends Controller
{
    public function index(){
return view('backend.testing');
    }

    public function store(){


        $leases = Lease::where('status','active')->get();
        foreach ($leases as $lease)

        $propertyUnitBills = Propertyunitservicebill::where('leas',$lease->id)->where('interval','monthly')->get();
//        dd($propertyUnitBills);

        foreach ($propertyUnitBills as $propertyUnitBill)
            $monthlyBill = Bill::create([
               'amount' =>$propertyUnitBill->amount,
               'lease_id' =>$propertyUnitBill->leas,
               'servicebill_id' =>$propertyUnitBill->servicebill_id
            ]);

        $totalBillableAmount = $propertyUnitBill->amount;
        $paidAmounts = Paidtenant::where('lease_id',$propertyUnitBill->leas)->get();
        if(count($paidAmounts)){
            foreach ($paidAmounts as $paidAmount){
                $balance = ($propertyUnitBill->amount);
                $balance1 = ($paidAmount->balance);

                $totalBillableAmount = ($balance1+$balance);
            }

        }
        $tenants = Tenantaccount::where('lease_id',$propertyUnitBill->leas)->get();
        if (count($tenants)){
            DB::table('tenantaccounts')->where('lease_id',$propertyUnitBill->leas)->update(['amount'=>($totalBillableAmount)]);

        }
        else{
            $bills =Bill::where('lease_id',$propertyUnitBill->leas)->get();
            foreach ($bills as $bill)
            //insert bill to tenants account table
            $tenantAccount = Tenantaccount::create([
                'user_id' => $lease->user_id,
                'lease_id' => $propertyUnitBill->leas,
                'bill_id' => $bill->id,
                'property_id' => $propertyUnitBill->propertyunit->property->id,
                'transaction_type' => credit,
                'amount' => $totalBillableAmount,
                'house' => $propertyUnitBill->propertyunit->house,

            ]);
        }

        DB::table('paidtenants')->where('lease_id',$propertyUnitBill->leas)->update(['balance'=>($totalBillableAmount)]);
        DB::table('tenantaccounts')->where('amount','<=',0)->delete();



    }
}
