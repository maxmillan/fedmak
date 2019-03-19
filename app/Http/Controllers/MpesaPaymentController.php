<?php

namespace App\Http\Controllers;

use App\Finalreport;
use App\Http\Requests\CreateMpesapaymentRequest;
use App\Models\Bill;
use App\Models\Lease;
use App\Models\Paidtenant;
use App\Models\Propertyunit;
use App\Models\Propertyunitservicebill;
use App\Models\Tenantaccount;
use App\Mpesapayment;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Safaricom\Mpesa\Mpesa;

class MpesaPaymentController extends Controller
{
    /**
     * @param Request $request
     */
    public function getMpesaPayment(Request $request){
        $payment = Mpesapayment::all();


            $payment = Mpesapayment::create([
                'TransactionType' => $request->TransactionType,
                'TransactionId' => $request->TransactionId,
                'TransTime' => $request->TransTime,
                'TransAmount' => $request->TransAmount,
                'BusinessShortCode' => $request->BusinessShortCode,
                'BillRefNumber' => $request->BillRefNumber,
                'InvoiceNumber' => $request->InvoiceNumber,
                'OrgAccountBalance' => $request->OrgAccountBalance,
                'ThirdPartyTransID' => $request->ThirdPartyTransID,
                'MSISDN' => $request->MSISDN,
                'FirstName' => $request->FirstName,
                'MiddleName' => $request->MiddleName,
                'LastName' => $request->LastName,
                'PaymentMode' => 'Mpesa',

            ]);
//            $leases = Lease::all();
//            $units = Propertyunit::all();

            $findUnits = Propertyunit::where('house','=',$payment->BillRefNumber)->get();
            foreach ($findUnits as $findUnit)
            $findLeases = Lease::where('propertyunit_id','=',$findUnit->id)->get();
            foreach ($findLeases as $findLease)

            $tenants = Paidtenant::create([
                'user_id'=>$findLease->user->id,
                'lease_id'=>$findLease->id,
                'payment_id'=>$payment->id,
                'property_id'=>$findLease->propertyunit->property->id,
                'transaction_type'=>debit,
                'amount'=>$payment->TransAmount,
                'house'=>$payment->BillRefNumber,
//                'bill'=>$bill->servicebill->name
            ]);
        $finalReports = Finalreport::create([
            'lease_id'=>$findLease->id,
            'user_id'=>$findLease->user->id,
            'property_id'=>$findLease->propertyunit->property->id,
            'amount'=>$payment->TransAmount,
            'transaction_type'=>'debit'
        ]);


           $balances = Tenantaccount::where('lease_id','=',$findLease->id)->get();
           $balans = Paidtenant::where('lease_id','=',$findLease->id)->get();
           foreach ($balances as $balance)

            $total = ($balance->amount);

           foreach ($balans as $balan)
               $totalTwo = ($balan->amount);

        /** @noinspection PhpUndefinedVariableInspection */
        $totalBalance = ($total - $totalTwo);

//            endforeach
        DB::table('tenantaccounts')->where('lease_id','=',$tenants->lease_id)->Where('amount','=',$tenants->amount)->delete();


        DB::table('tenantaccounts')->where('lease_id','=', $tenants->lease_id)->Where('amount','>',$tenants->amount)->update(['amount'=>($totalBalance)]);

    }



    public function registerUrls(){
        $token = Mpesa::generateSandBoxToken();

//        $url = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token)); //setting custom header


        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'ValidationURL' => 'https://http://fedmakpropertymanagers.co.ke/getMpesaValidation',
            'ConfirmationURL' => 'https://http://fedmakpropertymanagers.co.ke/getMpesaPayment',
            'ResponseType' => 'completed',
            'ShortCode' => '601426',
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        print_r($curl_response);

        echo $curl_response;
    }
    public function getMpesaValidation(Request $request){

    }

    public function simulate(){
        $mpesa= new Mpesa();
        $c2bTransaction= $mpesa->c2b(601426, 'CustomerPayBillOnline', 1800, 254708374149, 'A2' );
        var_dump($c2bTransaction);
    }
}
