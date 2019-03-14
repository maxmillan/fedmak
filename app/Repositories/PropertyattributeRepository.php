<?php

namespace App\Repositories;

use App\Models\Propertyattribute;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyattributeRepository
 * @package App\Repositories
 * @version January 7, 2019, 7:56 pm UTC
 *
 * @method Propertyattribute findWithoutFail($id, $columns = ['*'])
 * @method Propertyattribute find($id, $columns = ['*'])
 * @method Propertyattribute first($columns = ['*'])
*/
class PropertyattributeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propertyattribute::class;
    }
}
