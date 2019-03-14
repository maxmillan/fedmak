<?php

namespace App\Repositories;

use App\Models\Property;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyRepository
 * @package App\Repositories
 * @version January 7, 2019, 7:52 pm UTC
 *
 * @method Property findWithoutFail($id, $columns = ['*'])
 * @method Property find($id, $columns = ['*'])
 * @method Property first($columns = ['*'])
*/
class PropertyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'location',
        'units',
        'landlord'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Property::class;
    }
}
