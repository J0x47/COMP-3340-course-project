<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded = [];

    protected $attributes = [
    	'logo' => 'uploads/logo/default_logo2.png',
    	'cover_photo' => 'uploads/coverphoto/default_coverphoto2.jpg'
	];
    
    public function getRouteKeyName() {
    	return 'slug';
    }
    
    public function jobs() {
    	return $this->hasMany('App\Job');
    }
}
