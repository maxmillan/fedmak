<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Paidtenant
 * @package App\Models
 * @version January 20, 2019, 6:50 am UTC
 *
 * @property \App\Models\Lease lease
 * @property \App\Models\Payment payment
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection leases
 * @property \Illuminate\Database\Eloquent\Collection propertyspects
 * @property \Illuminate\Database\Eloquent\Collection propertyunitservicebills
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property integer user_id
 * @property integer lease_id
 * @property integer payment_id
 * @property string transaction_type
 * @property string balance
 * @property string amount
 */
class Paidtenant extends Model
{

    public $table = 'paidtenants';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'user_id',
        'lease_id',
        'payment_id',
        'property_id',
        'transaction_type',
        'bill',
        'balance',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'lease_id' => 'integer',
        'payment_id' => 'integer',
        'property_id' => 'integer',
        'transaction_type' => 'string',
        'balance' => 'string',
        'amount' => 'string'
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
    public function payment()
    {
        return $this->belongsTo(\App\Models\Payment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
