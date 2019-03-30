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
        $leases = Lease::where('status','active')->get  ();
//        $leases = Lease::where('id',2)->get();
        foreach ($leases as $lease) {
            $serviceBill = Propertyunitservicebill::where('propertyunit_id', $lease->propertyunit_id)->where('interval', 'monthly')->first();
            $serviceBillAmount = Propertyunitservicebill::where('propertyunit_id', $lease->propertyunit_id)->where('interval', 'monthly')->sum('amount');
//            dd($serviceBillAmount);

//        print_r($propertyUnitBills->toArray());die;

            if ($serviceBill) {
//                foreach ($propertyUnitBills as $serviceBill) {
                    //store bill

                    $bill = Bill::create([
                        'amount' => $serviceBillAmount,
                        'lease_id' => $lease->id,
                        'servicebill_id' => $serviceBill->servicebill_id,
                    ]);
                    //affect tenant account
                    $finalReports = Finalreport::create([
                        'lease_id' => $lease->id,
                        'user_id' => $lease->user->id,
                        'property_id' => $serviceBill->propertyunit->property->id,
                        'amount' => $serviceBillAmount,
                        'transaction_type' => 'credit'
                    ]);
                         $tenantTotal1 = Paidtenant::where('lease_id',$lease->id)->first();
//                    $amount = ($tenantTotal1->balance);
                        if (!$tenantTotal1){
                            $amount2 =0;
                            $amount3 = ($serviceBillAmount);
                            $amount4 = $amount2+$amount3;
                            $totalBillableAmount =($amount2+$amount4);
                        }
                        else{
                            $amount2 =($tenantTotal1->balance);
                            $amount3 = ($serviceBillAmount);
                            $totalBillableAmount =($amount2+$amount3);
                        }



                    $tenant = Tenantaccount::where('lease_id',$lease->id)->first();
                    if ($tenant){
                        DB::table('tenantaccounts')->where('lease_id',$lease->id)->update(['amount'=>($totalBillableAmount)]);
                    }
                    else{
                        //insert bill to tenants account table
                        $tenantAccount = Tenantaccount::create([
                            'user_id' => $lease->user_id,
                            'lease_id' => $lease->id,
                            'bill_id' => $bill->id,
                            'property_id' => $serviceBill->propertyunit->property->id,
                            'transaction_type' => credit,
                            'amount' => $totalBillableAmount,
                            'house' => $serviceBill->propertyunit->house,
                        ]);
                    }
                    DB::table('paidtenants')->where('lease_id',$lease->id)->update(['balance'=>($totalBillableAmount)]);
                    DB::table('tenantaccounts')->where('lease_id',$lease->id)->where('amount','<=',0)->delete();


                }
            }
        }



}