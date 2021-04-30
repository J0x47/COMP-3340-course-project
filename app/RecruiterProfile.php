<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruiterProfile extends Model
{
    //
    protected $guarded = [];

    public function user() 
    { 
        return $this->morphOne('App\User', 'profile');
    }
}
