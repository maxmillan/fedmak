<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Lease
 * @package App\Models
 * @version January 8, 2019, 5:41 pm UTC
 *
 * @property \App\Models\Propertyunit propertyunit
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection Bill
 * @property \Illuminate\Database\Eloquent\Collection Tenantaccount
 * @property integer user_id
 * @property integer propertyunit_id
 * @property string status
 */
class Lease extends Model
{

    public $table = 'leases';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'user_id',
        'propertyunit_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'propertyunit_id' => 'integer',
        'status' => 'string'
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
        return $this->belongsTo(\App\Models\Propertyunit::class,'propertyunit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

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
    public function tenantaccounts()
    {
        return $this->hasMany(\App\Models\Tenantaccount::class);
    }

    public function payments()
    {
        return $this->belongsTo(\App\Models\Mpesapayment::class);
    }

    public function propertyUnitServiceBill()
    {
        return $this->belongsTo(\App\Models\Propertyunitservicebill::class);
    }
    public function finalReport(){
        return $this->belongsTo(\App\Finalreport::class);

    }
}
