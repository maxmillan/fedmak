<?php

namespace App\Repositories;

use App\Models\Tenantaccount;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TenantaccountRepository
 * @package App\Repositories
 * @version January 20, 2019, 7:18 am UTC
 *
 * @method Tenantaccount findWithoutFail($id, $columns = ['*'])
 * @method Tenantaccount find($id, $columns = ['*'])
 * @method Tenantaccount first($columns = ['*'])
*/
class TenantaccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'lease_id',
        'payment_id',
        'bill_id',
        'transaction_type',
        'balance',
        'amount',
        'status',
        'house'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tenantaccount::class;
    }
}
