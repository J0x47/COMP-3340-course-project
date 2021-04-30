<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    // middleware: protect route with middleware
    public function __construct(){
          $this->middleware(['employer','verified'],['except'=>array('index','company')]);
    }


    public function index($id, Company $company) {
    	return view('company.index', compact('company'));
    }


    // public function company(){
   	//   // paginate the Company model with  20 items per page
    //   $companies = Company::latest()->paginate(20);
    //   return view('company.company',compact('companies'));
    // }

     public function create(){
     	return view('company.create');
     }

     public function store(){
    	$user_id = auth()->user()->id;
    		
       Company::where('user_id',$user_id)->update([
         'address'=>request('address'),
    			'tel'=>request('tel'),
    			'website'=>request('website'),
    			'slogan'=>request('slogan'),
    			'description'=>request('description')
    		]);
    		return redirect()->back()->with('message','Company Sucessfully Updated!');

    }

    public function company(){
      $companies = Company::latest()->paginate(20);
      return view('company.company',compact('companies'));
    }
    
     public function coverPhoto(Request $request){
         $user_id = auth()->user()->id;
         if($request->hasfile('cover_photo')){

             $file = $request->file('cover_photo');
             $ext = $file->getClientOriginalExtension();
             $filename = time().'.'.$ext;
             $file->move('uploads/coverphoto/',$filename);
             $filepath = 'uploads/logo/' . $filename;
             Company::where('user_id',$user_id)->update([
                 'cover_photo'=>$filepath
             ]);
         }
         return redirect()->back()->with('message','Company coverphoto Sucessfully Updated!');

     }
     public function companyLogo(Request $request){
         $user_id = auth()->user()->id;
         if($request->hasfile('company_logo')){

             $file = $request->file('company_logo');
             $ext = $file->getClientOriginalExtension();
             $filename = time().'.'.$ext;
             $file->move('uploads/logo/',$filename);
             $filepath = 'uploads/logo/' . $filename;
             Company::where('user_id',$user_id)->update([
                 'logo'=>$filepath
             ]);
         }
         return redirect()->back()->with('message','Company logo Sucessfully Updated!');

     }
}
