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


        $findUnit = Propertyunit::where('house','=',$payment->BillRefNumber)->first();
                $findLease = Lease::where('propertyunit_id','=',$findUnit->id)->first();

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
                    'property_id'=>$findLease->propertyunit->property_id,
                    'amount'=>$payment->TransAmount,
                    'transaction_type'=>'debit'
                ]);

                $balance = Tenantaccount::where('lease_id','=',$findLease->id)->first();
                $balans = Paidtenant::where('lease_id','=',$findLease->id)->first();
                if ($balance){
                    $amount = ($payment->TransAmount);
                    $amount1 = ($balance->amount);
                    $totalBalance = ($amount1-$amount);
                }
                else{
                    $amount = ($payment->TransAmount);
                    $amount1 = ($balans->balance);
                    $totalBalance = ($amount1-$amount);



                }

        DB::table('paidtenants')->where('lease_id',"=", $tenants->lease_id)->update(['balance'=>($totalBalance)]);

        DB::table('tenantaccounts')->where('lease_id','=', $tenants->lease_id)->update(['amount'=>($totalBalance)]);

//            endforeach
        DB::table('tenantaccounts')->where('lease_id','=',$tenants->lease_id)->Where('amount','<=',0)->delete();



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
            'ValidationURL' => 'https://2a983c22.ngrok.io/rental/public/getMpesaValidation',
            'ConfirmationURL' => 'https://2a983c22.ngrok.io/rental/public/getMpesaPayment',
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
        $c2bTransaction= $mpesa->c2b(601426, 'CustomerPayBillOnline', 2000, 254708374149, 'A1' );
        var_dump($c2bTransaction);
    }
}
