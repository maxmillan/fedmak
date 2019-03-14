<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Propertyunitattribute
 * @package App\Models
 * @version January 8, 2019, 4:26 pm UTC
 *
 * @property \App\Models\Propertyattribute propertyattribute
 * @property \App\Models\Propertyunit propertyunit
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection Lease
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property integer propertyunit_id
 * @property integer propertyattribute_id
 */
class Propertyunitattribute extends Model
{

    public $table = 'propertyunitattributes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'propertyunit_id',
        'propertyattribute_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'propertyunit_id' => 'integer',
        'propertyattribute_id' => 'integer'
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
    public function propertyattribute()
    {
        return $this->belongsTo(\App\Models\Propertyattribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyunit()
    {
        return $this->belongsTo(\App\Models\Propertyunit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function leases()
    {
        return $this->hasMany(\App\Models\Lease::class);
    }
}
