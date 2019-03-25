<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Propertyunit
 * @package App\Models
 * @version January 8, 2019, 5:15 pm UTC
 *
 * @property \App\Models\Property property
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection Lease
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property string house
 * @property string housetype
 * @property integer property_id
 */
class Propertyunit extends Model
{

    public $table = 'propertyunits';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'house',
        'housetype',
        'status',
        'property_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'house' => 'string',
        'status' => 'string',
        'housetype' => 'string',
        'property_id' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function leases()
    {
        return $this->hasMany(\App\Models\Lease::class);
    }

    public function finalReport()
    {
        return $this->belongsTo(\App\Finalreport::class);
    }
}
