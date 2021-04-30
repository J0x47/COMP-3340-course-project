<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\User;
use App\Category;
use App\City;
class JobController extends Controller
{
    public function __construct(){
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs','searchJobs','category')]);
    }
    
    
    public function index(){
        $numConfig = $_ENV['HOMEPAGE_MAX_JOB_DISPLAYED']; // .env
        $jobs = Job::latest()->limit($numConfig)->where('status',0)->get();
        $categories = Category::with('jobs')->get();
        $companies = Company::get();
        $count = $companies->count();
        
        $companies = $count >= $numConfig ? Company::get()->random($numConfig) : Company::all()->limit($count)->get();

        return view('welcome',compact('jobs','companies','categories'));
    }
    public function show($id,Job $job){

        $jobRecommendations = $this->jobRecommendations($job);

        return view('jobs.show',compact('job','jobRecommendations'));
    }

    public function jobRecommendations($job){
        $data = [];
        
        $jobsBasedOnCategories = Job::latest()->where('category_id',$job->category_id)
                             ->whereDate('due_date','>',date('Y-m-d'))
                             ->where('id','!=',$job->id)
                             ->where('status',0)
                             ->limit(6)
                             ->get();
        array_push($data,$jobsBasedOnCategories);
                           
        $jobBasedOnCompany = Job::latest()
                                ->where('company_id',$job->company_id)
                                ->whereDate('due_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',0)
                                ->limit(6)
                                ->get();
            array_push($data,$jobBasedOnCompany);

        $jobBasedOnTitle= Job::where('job_title','LIKE','%'.$job->job_title.'%')
                            ->where('id','!=',$job->id)
                            ->where('status',0)->limit(6);
        
        array_push($data,$jobBasedOnTitle);

        $collection  = collect($data);
        $unique = $collection->unique("id");
        $jobRecommendations =  $unique->values()->first();
        
        return $jobRecommendations;
    }


    public function company(){
        return view('company.index');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
                    'job_title' => 'required',
        ]);

        if ($validator->fails()) {
                    return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        }

        $req = $request;
        // $validatedData = $request->validated();
        $req['city_id'] = City::where('name',$req->input('city'))->first()->id;
        Job::findOrFail($id)->update($req->except('city'));

        return redirect()->back()->with('message','Job  Sucessfully Updated!');

    }
    public function applicant(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();

        return view('jobs.applicants',compact('applicants'));
    }
    

    public function  create(){
        return view('jobs.create');
    }

    // public function  store(JobPostRequest $request){
    public function  store(Request $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $region_id = $request->input('region_id');
        $city_query = City::where([['region_id','=', $region_id],['name','=',$request->input('city')]]);
        $city_id = (($city_query->count())>=1)? $city_query->first()->id: 0;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'job_title'=>request('job_title'),
            'slug' =>str_slug(request('job_title')),
            'description'=>request('description'),
            'category_id' =>request('category'),
            'job_type'=>request('job_type'),
            'vacancy'=>request('vacancy'),
            'city_id'=> $city_id,
            'region_id'=> $region_id,
            'gender'=>request('gender'),
            'experience'=>request('experience'),
            'salary'=>request('salary'),
            'due_date'=>request('due_date')
        ]);

        return redirect()->back()->with('message','Job posted successfully!');
     }
     
     public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');

    }

    public function allJobs(Request $request){  
        $search = $request->get('search');
        $job_title = $request->get('job_title');
        $search_type = $request->get('search_type');
        $job_type = $request->get('job_type');
        $category_id = $request->get('category_id');
        $city = $request->get('city');

        // search from home page
        if($search_type == 1) {
            if($search && $city){
                $jobs = Job::where(function($query) use ($job_title, $search){
                            $query->where('job_title','like', '%' . $search . '%')
                            ->orWhere('description','like', '%' . $search . '%');
                        })->whereIn('city_id',function($query) use($city) {
                            $query->select('id')
                            ->from('cities')
                            ->where('name', 'like', '%' . $city . '%')
                            ->orderBy('created_at', 'desc');
                        })->paginate(20);
            }else {
                $jobs = Job::where('job_title','like', '%' . $search . '%')
                ->orWhere('description','like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
            }

        } else if($search_type == 2) {
            if($job_title && $job_type && $category_id && $city) {
                $jobs = Job::where('job_title','like', '%' . $job_title . '%')
                ->where('job_type', $job_type)  
                ->where('category_id', $category_id)  
                ->whereIn('city_id',function($query) use($city) {
                    $query->select('id')
                    ->from('cities')
                    ->where('name', 'like', '%' . $city . '%');}
                )->orderBy('created_at', 'desc')
                ->paginate(20);

            }else if($job_title && $city) {
                $jobs = Job::where('job_title','like', '%' . $job_title . '%')
                ->whereIn('city_id',function($query) use($city) {
                    $query->select('id')
                    ->from('cities')
                    ->where('name', 'like', '%' . $city . '%');}
                )->orderBy('created_at', 'desc')
                ->paginate(20);

            } else if($job_title){
                $jobs = Job::where('job_title','like', '%' . $job_title . '%')
                ->orWhere('category_id', $category_id)
                ->orWhere('job_type', $job_type)->orderBy('created_at', 'desc')
                ->paginate(20);

            }else {
                if($city) {
                    $jobs = Job::Where('job_type', $job_type)  
                    ->orWhere('category_id', $category_id)  
                    ->orWhereIn('city_id',function($query) use($city) {
                        $query->select('id')
                        ->from('cities')
                        ->where('name', 'like', '%' . $city . '%');})->orderBy('created_at', 'desc')
                    ->paginate(20);
                } else {
                    $jobs = Job::Where('job_type', $job_type)  
                    ->orWhere('category_id', $category_id)->orderBy('created_at', 'desc')
                    ->paginate(20);
                }
            }
            
        } else {
            $jobs = Job::latest()->paginate(20);
        }

        return view('jobs.alljobs',compact('jobs'));
    }

    public function searchJobs(Request $request){
       
        $keyword = $request->get('keyword');
        $users = Job::where('job_title','like','%'.$keyword.'%')
                ->limit(5)->get();
        return response()->json($users);

    }
    
    

}
