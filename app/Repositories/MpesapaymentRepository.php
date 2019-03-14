<?php

namespace App\Repositories;

use App\Models\Mpesapayment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MpesapaymentRepository
 * @package App\Repositories
 * @version January 23, 2019, 1:05 pm UTC
 *
 * @method Mpesapayment findWithoutFail($id, $columns = ['*'])
 * @method Mpesapayment find($id, $columns = ['*'])
 * @method Mpesapayment first($columns = ['*'])
*/
class MpesapaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Mpesapayment::class;
    }
}
