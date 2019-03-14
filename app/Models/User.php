<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 * @version January 11, 2019, 7:54 pm UTC
 *
 * @property \App\Models\Propertyunit propertyunit
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property \Illuminate\Database\Eloquent\Collection Lease
 * @property \Illuminate\Database\Eloquent\Collection Message
 * @property \Illuminate\Database\Eloquent\Collection propertyspects
 * @property \Illuminate\Database\Eloquent\Collection propertyunitservicebills
 * @property \Illuminate\Database\Eloquent\Collection tenantaccounts
 * @property \Illuminate\Database\Eloquent\Collection Tenantmessage
 * @property string name
 * @property string last
 * @property string idno
 * @property string phone
 * @property string password
 * @property string remember_token
 * @property integer propertyunit_id
 */

class User extends Model
{

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

use Notifiable;

    public $fillable = [
        'name',
        'last',
        'idno',
        'phone',
        'password',
        'remember_token',
        'propertyunit_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'last' => 'string',
        'idno' => 'string',
        'phone' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function messages()
    {
        return $this->hasMany(\App\Models\Message::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tenantmessages()
    {
        return $this->hasMany(\App\Models\Tenantmessage::class);
    }

    public function complaints()
    {
        return $this->belongsTo(\App\Complaint::class);
    }

    public function finalReport()
    {
        return $this->belongsTo(\App\Finalreport::class);
    }
}
