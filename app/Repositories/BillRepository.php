<?php

namespace App\Repositories;

use App\Models\Bill;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BillRepository
 * @package App\Repositories
 * @version January 18, 2019, 9:30 am UTC
 *
 * @method Bill findWithoutFail($id, $columns = ['*'])
 * @method Bill find($id, $columns = ['*'])
 * @method Bill first($columns = ['*'])
*/
class BillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lease_id',
        'servicebill_id',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bill::class;
    }
}
