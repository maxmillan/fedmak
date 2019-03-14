<?php

namespace App\Repositories;

use App\Models\Servicebill;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServicebillRepository
 * @package App\Repositories
 * @version January 8, 2019, 5:37 pm UTC
 *
 * @method Servicebill findWithoutFail($id, $columns = ['*'])
 * @method Servicebill find($id, $columns = ['*'])
 * @method Servicebill first($columns = ['*'])
*/
class ServicebillRepository extends BaseRepository
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
        return Servicebill::class;
    }
}
