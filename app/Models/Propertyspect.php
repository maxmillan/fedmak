<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Propertyspect
 * @package App\Models
 * @version January 8, 2019, 6:09 pm UTC
 *
 * @property \App\Models\Property property
 * @property \App\Models\Propertyunit propertyunit
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property integer property_id
 * @property integer propertyunit_id
 */
class Propertyspect extends Model
{

    public $table = 'propertyspects';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'property_id',
        'propertyunit_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'property_id' => 'integer',
        'propertyunit_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function property()
    {
        return $this->belongsTo(\App\Models\Property::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyunit()
    {
        return $this->belongsTo(\App\Models\Propertyunit::class);
    }
}
