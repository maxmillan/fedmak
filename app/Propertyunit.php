<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertyunit extends Model
{
    public function lease(){
        return $this->belongsTo('App\Lease');
    }
}
