<?php

namespace App\Repositories;

use App\Models\Leases;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeasesRepository
 * @package App\Repositories
 * @version January 8, 2019, 4:25 pm UTC
 *
 * @method Leases findWithoutFail($id, $columns = ['*'])
 * @method Leases find($id, $columns = ['*'])
 * @method Leases first($columns = ['*'])
*/
class LeasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'propertyunitattribute_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Leases::class;
    }
}
