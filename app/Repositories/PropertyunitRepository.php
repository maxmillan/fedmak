<?php

namespace App\Repositories;

use App\Models\Propertyunit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropertyunitRepository
 * @package App\Repositories
 * @version January 8, 2019, 5:15 pm UTC
 *
 * @method Propertyunit findWithoutFail($id, $columns = ['*'])
 * @method Propertyunit find($id, $columns = ['*'])
 * @method Propertyunit first($columns = ['*'])
*/
class PropertyunitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'house',
        'housetype',
        'property_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propertyunit::class;
    }

    public function lease(){
        return $this->belongsTo('App\Lease');
    }


}
