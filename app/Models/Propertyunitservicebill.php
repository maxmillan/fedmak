<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Propertyunitservicebill
 * @package App\Models
 * @version January 10, 2019, 2:59 pm UTC
 *
 * @property \App\Models\Propertyunit propertyunit
 * @property \App\Models\Servicebill servicebill
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection propertyspects
 * @property \Illuminate\Database\Eloquent\Collection Tenantaccount
 * @property string interval
 * @property string amount
 * @property integer servicebill_id
 * @property integer propertyunit_id
 */
class Propertyunitservicebill extends Model
{

    public $table = 'propertyunitservicebills';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'interval',
        'amount',
        'servicebill_id',
        'propertyunit_id',
        'leas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'interval' => 'string',
        'amount' => 'integer',
        'servicebill_id' => 'integer',
        'propertyunit_id' => 'integer',
        'leas' => 'integer'
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
    public function propertyunit()
    {
        return $this->belongsTo(\App\Models\Propertyunit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function servicebill()
    {
        return $this->belongsTo(\App\Models\Servicebill::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tenantaccounts()
    {
        return $this->hasMany(\App\Models\Tenantaccount::class);
    }
}
