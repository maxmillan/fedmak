<?php

namespace App\Jobs;

use App\Finalreport;
use App\Models\Bill;
use App\Models\Lease;
use App\Models\Paidtenant;
use App\Models\Propertyunitservicebill;
use App\Models\Tenantaccount;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class CreateMonthlyBills implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $leases = Lease::where('status','active')->get();
//        $leases = Lease::where('id',20)->get();
        foreach ($leases as $lease){
            $propertyUnitBills = Propertyunitservicebill::where('propertyunit_id',$lease->propertyunit->id)->where('interval','monthly')->get();
//        print_r($propertyUnitBills);die;
            foreach ($propertyUnitBills as $propertyUnitBill){
                $monthlyBill = Bill::create([
                    'amount' =>$propertyUnitBill->amount,
                    'lease_id' =>$propertyUnitBill->leas,
                    'servicebill_id' =>$propertyUnitBill->servicebill_id
                ]);
                $finalReports = Finalreport::create([
                    'lease_id'=>$lease->id,
                    'user_id'=>$lease->user->id,
                    'property_id'=>$propertyUnitBill->propertyunit->property->id,
                    'amount'=>$propertyUnitBill->amount,
                    'transaction_type'=>'credit'
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


    }
}
