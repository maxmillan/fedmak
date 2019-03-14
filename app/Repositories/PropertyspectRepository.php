<?php

namespace App\Repositories;

use App\Models\Propertyspect;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyspectRepository
 * @package App\Repositories
 * @version January 8, 2019, 6:09 pm UTC
 *
 * @method Propertyspect findWithoutFail($id, $columns = ['*'])
 * @method Propertyspect find($id, $columns = ['*'])
 * @method Propertyspect first($columns = ['*'])
*/
class PropertyspectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'property_id',
        'propertyunit_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propertyspect::class;
    }
}
