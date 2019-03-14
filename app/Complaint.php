<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Complaint extends Model
{
    use Notifiable;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
