<?php

namespace App\Repositories;

use App\Models\Propertyunitattribute;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyunitattributeRepository
 * @package App\Repositories
 * @version January 8, 2019, 4:26 pm UTC
 *
 * @method Propertyunitattribute findWithoutFail($id, $columns = ['*'])
 * @method Propertyunitattribute find($id, $columns = ['*'])
 * @method Propertyunitattribute first($columns = ['*'])
*/
class PropertyunitattributeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'propertyunit_id',
        'propertyattribute_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propertyunitattribute::class;
    }
}
