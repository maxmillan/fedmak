<?php

namespace App\Repositories;

use App\Models\Propertyunitservicebill;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyunitservicebillRepository
 * @package App\Repositories
 * @version January 10, 2019, 2:59 pm UTC
 *
 * @method Propertyunitservicebill findWithoutFail($id, $columns = ['*'])
 * @method Propertyunitservicebill find($id, $columns = ['*'])
 * @method Propertyunitservicebill first($columns = ['*'])
*/
class PropertyunitservicebillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'interval',
        'amount',
        'servicebill_id',
        'propertyunit_id',
        'leas'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propertyunitservicebill::class;
    }
}
