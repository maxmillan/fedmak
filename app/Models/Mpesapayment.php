<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Mpesapayment
 * @package App\Models
 * @version January 23, 2019, 1:05 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection Paidtenant
 * @property \Illuminate\Database\Eloquent\Collection propertyspects
 * @property \Illuminate\Database\Eloquent\Collection propertyunitservicebills
 * @property \Illuminate\Database\Eloquent\Collection Report
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property string TransactionType
 * @property string TransactionId
 * @property string TransTime
 * @property string TransAmount
 * @property string BusinessShortCode
 * @property string BillRefNumber
 * @property string InvoiceNumber
 * @property string OrgAccountBalance
 * @property string ThirdPartyTransID
 * @property string MSISDN
 * @property string FirstName
 * @property string MiddleName
 * @property string LastName
 * @property string PaymentMode
 */
class Mpesapayment extends Model
{

    public $table = 'payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'TransactionType',
        'TransactionId',
        'TransTime',
        'TransAmount',
        'BusinessShortCode',
        'BillRefNumber',
        'InvoiceNumber',
        'OrgAccountBalance',
        'ThirdPartyTransID',
        'MSISDN',
        'FirstName',
        'MiddleName',
        'LastName',
        'PaymentMode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'TransactionType' => 'string',
        'TransactionId' => 'string',
        'TransTime' => 'string',
        'TransAmount' => 'string',
        'BusinessShortCode' => 'string',
        'BillRefNumber' => 'string',
        'InvoiceNumber' => 'string',
        'OrgAccountBalance' => 'string',
        'ThirdPartyTransID' => 'string',
        'MSISDN' => 'string',
        'FirstName' => 'string',
        'MiddleName' => 'string',
        'LastName' => 'string',
        'PaymentMode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paidtenants()
    {
        return $this->hasMany(\App\Models\Paidtenant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reports()
    {
        return $this->hasMany(\App\Models\Report::class);
    }
}
