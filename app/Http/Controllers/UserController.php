<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserController extends Controller
{

    /** Protecting Routes
     * https://laravel.com/docs/5.8/authentication
     * If you are using controllers, you may call the middleware method from the 
     * controller's constructor instead of attaching it in the route definition directly:
     *
     * Redirecting Unauthenticated Users
     * app/Http/Middleware/Authenticate.php
     * redirectTo function
     * route('login');
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    //
    public function index() {
    	return view('profile.index');
    }

    public function store(Request $request) {
        $this->validate($request,[

            // 'address'=>'required',
            // 'bio'=>'required|min:20',
            // 'experience'=>'required|min:20',
            'contact_number'=>'required|string|min:11'
        ]);

        // Helper: auth()
    	// $user_id = auth()->user()->id;
     //    $profile->user()->save($user);
        auth()->user()->update([
            'fname' => request('fname'),
            'lname' => request('lname'),
        ]);

        auth()->user()->profile->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
            'contact_number' => request('contact_number')
        ]);

    	// Profile::where('user_id', $user_id)->update([
    	// 	'address' => request('address'),
    	// 	'experience' => request('experience'),
    	// 	'bio' => request('bio'),
     //        'contact_number' => request('contact_number')
    	// ]);
    	return redirect()->back()->with('message', 'Profile Successfully Updated!');

    }

    public function coverletter(Request $request) {
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

    	$cover = $request->file('cover_letter')->store('public/files');
        auth()->user()->profile->update([
            'cover_letter' => $cover,
        ]);

    	return redirect()->back()->with('message', 'Cover letter Successfully Updated!');
    }

    public function resume(Request $request) {
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

    	$resume = $request->file('resume')->store('public/files');
        auth()->user()->profile->update([
            'resume' => $resume,
        ]);

    	return redirect()->back()->with('message', 'Resume Successfully Updated!');
    }

    public function avatar(Request $request) {
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);

        if($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/avatar/', $filename);
            $filepath = 'uploads/avatar/' . $filename;
            auth()->user()->update(['avatar' => $filepath,
            ]);
            return redirect()->back()->with('message', 'Profile picture Successfully Updated!');
        }
    }

}
