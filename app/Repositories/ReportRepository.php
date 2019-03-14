<?php

namespace App\Repositories;

use App\Models\Report;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReportRepository
 * @package App\Repositories
 * @version January 15, 2019, 3:19 pm UTC
 *
 * @method Report findWithoutFail($id, $columns = ['*'])
 * @method Report find($id, $columns = ['*'])
 * @method Report first($columns = ['*'])
*/
class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'payment_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Report::class;
    }
}
