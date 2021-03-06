<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Profile;
use Hash;
use Illuminate\Support\Facades\Validator;

class EmployerRegisterController extends Controller
{
    
    public function employerRegister(Request $request){
        
        $this->validate($request,[
            'cname'=>'required|string|max:60',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $profile = Profile::create()::create();

    	$user =  User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => User::TYPE_RECRUITER,
        ]);

        $profile->user()->save($user);
         
        Company::create([
                'user_id' => $user->id,
                'cname' => request('cname'),
                'slug'=>str_slug(request('cname'))

        ]);

        return redirect()->to('login');

       
    }
}
