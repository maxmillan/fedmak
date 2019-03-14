<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpesapayment extends Model
{
    protected $table='payments';

    protected $fillable=[
        'TransactionType','TransactionId','TransTime','TransAmount','BusinessShortCode','BillRefNumber','InvoiceNumber','OrgAccountBalance','ThirdPartyTransID','MSISDN','FirstName','MiddleName','LastName','PaymentMode',
    ];

    public function lease()
    {
        return $this->belongsTo(\App\Models\Lease::class);
    }
}
