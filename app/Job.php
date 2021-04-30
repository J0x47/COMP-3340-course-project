<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Job extends Model
{   
	protected $guarded = [];

    // default value for columns
    protected $attributes = [
           'vacancy' => 0,
           'experience' => 0,
    ];

    // append custom properties to the Model Job
    protected $appends = ['location', 'posted_by_name', 'company_name', 'job_type_name'];
    protected $with = ['city'];

    const JOB_TYPE_FULLTIME = 1;
    const JOB_TYPE_PARTTIME = 2;
    const JOB_TYPE_CONTRACT = 3;
    const JOB_TYPE_INTERSHIP = 4;
    const JOB_TYPE_TEMPORARY = 5;

    public function getJobTypeNameAttribute() {
        $job_type = $this->job_type;

        switch ($job_type) {
            case self::JOB_TYPE_FULLTIME:
                return 'fulltime';
                break;
            case self::JOB_TYPE_PARTTIME:
                return 'parttime'; 
                break;
            case self::JOB_TYPE_CONTRACT:
                return 'contract'; 
                break;
            case self::JOB_TYPE_INTERSHIP:
                return 'parttime'; 
                break;
            case self::JOB_TYPE_TEMPORARY:
                return 'temporary'; 
                break;
            default:
                return 'unknown';
                break;
        }
    }
    
	public function getRouteKeyName(){
		return 'slug';
	}


    public function company(){
    	return $this->belongsTo('App\Company','company_id','id')->withDefault();
    }

    // one posted job can only belongs to a posting user (a recruiter)
    public function posted_by() {
        return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
  
    public function city() {
        // withDefault: set null if associated Model is null
        return $this->belongsTo(City::class)->withDefault();
    }

    public function region() {
        return $this->belongsTo(Region::class)->withDefault();
    }


    public function getPostedByNameAttribute() {
        return $this->posted_by->full_name;
    }

    public function getCompanyNameAttribute() {
        return $this->company->name;
    }

    public function getLocationAttribute()  {
        return ($this->city->name && $this->region->code)? 
        ($this->city->name . ', ' . $this->region->code) : '';
    }

    // a job can be applied by many job seekers in User model
    public function users(){
        return $this->belongsToMany(User::class)
            ->withTimeStamps()
            ->using('App\JobUser')
            ->withPivot([
                'job_id',
                'user_id',
                'created_at',
                'id',
            ]);
    }

    public function checkApplication(){
    	return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    public function favorites(){
        return $this->belongsToMany(User::class,'favourites','job_id','user_id')->withTimeStamps();
    }
    public function checkSaved(){
        return \DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }
     

}
