<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Bill
 * @package App\Models
 * @version January 18, 2019, 9:30 am UTC
 *
 * @property \App\Models\Lease lease
 * @property \App\Models\Servicebill servicebill
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection propertyspects
 * @property \Illuminate\Database\Eloquent\Collection propertyunitservicebills
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property \Illuminate\Database\Eloquent\Collection Tenantaccount
 * @property integer lease_id
 * @property integer servicebill_id
 * @property string amount
 */
class Bill extends Model
{

    public $table = 'bills';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'propertyunit_id',
        'lease_id',
        'servicebill_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'propertyunit_id' => 'integer',
        'lease_id' => 'integer',
        'servicebill_id' => 'integer',
        'amount' => 'integer'
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
    public function lease()
    {
        return $this->belongsTo(\App\Models\Lease::class);
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

    public function payment()
    {
        return $this->belongsTo(\App\Models\Mpesapayment::class);
    }
}
