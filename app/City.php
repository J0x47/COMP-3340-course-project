<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $with = ['region'];
    protected $appends = ['region_name'];


    public function region() {
    	return $this->belongsTo('App\Region')->withDefault();
    }

    public function getRegionNameAttribute() {
    	return $this->region->code;
    }
}
