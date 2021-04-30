<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Company;
use App\Job;
use App\Role;
use Auth;

class User extends Authenticatable
{   
    // job_type: fulltime, parttime, contract, intership, and temporary 

    const TYPE_JOBSEEKER = 1;
    const TYPE_RECRUITER = 2;
    const TYPE_SYSADMIN = 3;
    

    use Notifiable;

    // append custom properties to the Model User
    protected $appends = ['full_name'];
    protected $with = ['profile'];

    protected $attributes = [
           'avatar' => 'uploads/avatar/default_avatar.png',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'user_type',
    // ];
    protected $guarded = [];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];


    public function setStatus() {
        $this->status = true;
        $this->save();
    }
    // public function profile(){
    //     return $this->hasOne(Profile::class);
    // }

    // Defining An Accessor
    public function getFullNameAttribute() {
        return ucfirst($this->fname) . ' ' . ucfirst($this->lname);
        // return $this->fname . ' ' . $this->lname;
    }


    public static function userTypeCheck($type) {
        return Auth::user()->user_type==$type;
    }



    // polymorphic relationship
    public function profile()
    {
       return $this->morphTo();
    }

    public function company() {
        return $this->hasOne(Company::class);
    }

    // ???
    public function favorites(){
        return $this->belongsToMany(Job::class,'favourites','user_id','job_id')->withTimeStamps();
    }


    /**
     *  Many-to-many
     * An example of such a relationship is a user with many roles, where the roles are also shared by other users. 
     * For example, many users may have the role of "Admin".To define this relationship, three database tables are 
     * needed: users, roles, and role_user. The  role_user table is derived from the alphabetical order of the related model
     * names,  and contains the user_id and role_id columns.
     */ 
   // Many-to-many relationships are defined by writing a method that returns the result of the  belongsToMany method
    // one job can have many applicants (jobseekers from User model)
    public function jobs(){
        return $this->belongsToMany(Job::class)->withTimeStamps();
    }


    // A one-to-many relationship is used to define relationships where a single model owns any amount of other models
    // a recruiter can post many jobs: one-to-many
    public function posted_jobs(){
        return $this->hasMany('App\Job');
    }

    public function roles(){
            return $this->belongsToMany(Role::class);
    }

}
