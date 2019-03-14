<?php

namespace App\Repositories;

use App\Models\Paidtenant;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaidtenantRepository
 * @package App\Repositories
 * @version January 20, 2019, 6:50 am UTC
 *
 * @method Paidtenant findWithoutFail($id, $columns = ['*'])
 * @method Paidtenant find($id, $columns = ['*'])
 * @method Paidtenant first($columns = ['*'])
*/
class PaidtenantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'lease_id',
        'payment_id',
        'transaction_type',
        'balance',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Paidtenant::class;
    }
}
