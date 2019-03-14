<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Servicebill
 * @package App\Models
 * @version January 8, 2019, 5:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Bill
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection Propertyunitservicebill
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property string name
 */
class Servicebill extends Model
{

    public $table = 'servicebills';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
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
    public function bills()
    {
        return $this->hasMany(\App\Models\Bill::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function propertyunitservicebills()
    {
        return $this->hasMany(\App\Models\Propertyunitservicebill::class);
    }
}
