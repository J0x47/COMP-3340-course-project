<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    public function cities() {
    	$this->hasMany('App\City');
    }
}
