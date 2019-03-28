<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Property
 * @package App\Models
 * @version January 7, 2019, 7:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection propertyunitattributes
 * @property \Illuminate\Database\Eloquent\Collection Propertyunit
 * @property string name
 * @property string code
 * @property string location
 * @property string units
 * @property string landlord
 */
class Property extends Model
{

    public $table = 'properties';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'code',
        'location',
        'units',
        'landlord'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'location' => 'string',
        'units' => 'string',
        'landlord' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function propertyunits()
    {
        return $this->hasMany(\App\Models\Propertyunit::class);
    }
    public function leases()
    {
        return $this->hasMany(\App\Models\Lease::class);
    }
    public function finalReport()
    {
        return $this->belongsTo(\App\Finalreport::class);
    }
}
