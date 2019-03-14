<?php

namespace App\Repositories;

use App\Models\Lease;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeaseRepository
 * @package App\Repositories
 * @version January 8, 2019, 5:41 pm UTC
 *
 * @method Lease findWithoutFail($id, $columns = ['*'])
 * @method Lease find($id, $columns = ['*'])
 * @method Lease first($columns = ['*'])
*/
class LeaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'propertyunit_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lease::class;
    }

    public function propertyUnit(){
        return $this->belongsTo('App\Propertyunit');
    }




}
