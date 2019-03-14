<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finalreport extends Model
{
    protected $fillable = [
        'lease_id', 'user_id','amount','transaction_type','property_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function propertyUnit()
    {
        return $this->belongsTo(\App\Models\Propertyunit::class);
    }

    public function lease()
    {
        return $this->belongsTo(\App\Models\Lease::class);
    }
}
