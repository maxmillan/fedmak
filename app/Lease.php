<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    public function propertyUnit(){
        return $this->belongsTo('App\Propertyunit');
    }

    public function payment(){
        return $this->belongsTo('App\Models\Mpesapayment');
    }
}
