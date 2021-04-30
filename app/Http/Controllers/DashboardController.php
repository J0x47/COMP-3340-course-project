<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use App\Company;
use App\JobUser;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware(['admin','verified']);
    }


    public function admin_default() {
        return view('admin.index_default');
    }


    public function index(){
        $chartData = [];

        // report card data
        // users registered
        $numOfRegUsers = User::all()->count();
        // jobs posted
        $numOfPostedJobs = Job::all()->count();

        // employers created
        $numOfEmployers = Company::all()->count();

        // applications sent
        $numOfApplications = DB::table('job_user')->count();

        $chartData['users_report'] = $numOfRegUsers;
        $chartData['jobs_report']  = $numOfPostedJobs;
        $chartData['companies_report']  = $numOfEmployers;
        $chartData['applications_report'] = $numOfApplications;


        // line chart area data
        $result = DB::table("jobs")
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw("(COUNT(*)) as total_jobs"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();

        $chartData['chart_report'] = $result;

        // bar chart area data
        $barChartResult = DB::table("job_user")
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw("(COUNT(*)) as total_applications"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();
        $chartData['bar_chart_report'] = $barChartResult;

        // dd($chartData);
        
    	return view('admin.index', $chartData);
    }

	
    public function getAllJobs(){
        $jobs = Job::latest()->paginate(50);
        return view('admin.job',compact('jobs'));
    }

    public function changeJobStatus($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');
    }
    
    public function chartAreaData() {
        $result = DB::table("jobs")
                ->select(DB::raw("MONTH(created_at) as month") ,DB::raw("(COUNT(*)) as total_jobs"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();

        return response()->json($result);
    }


    public function chartJobTypeData() {
        $result=DB::table("jobs")
                ->select(DB::raw("(COUNT(*)) as count"), DB::raw("case job_type when 1 then 'fulltime' when 2 then 'parttime' when 3 then 'contract' when 4 then 'intership' when 5 then 'temporary' else 'unknown' end as job_type"))
                ->groupBy("job_type")->get()
                ->mapWithKeys(function ($item){
                    return [$item->job_type => $item->count];
                });
          
        $data = [];
        array_push($data, data_get($result, 'fulltime', 0));
        array_push($data, data_get($result, 'parttime', 0));
        array_push($data, data_get($result, 'contract', 0));
        array_push($data, data_get($result, 'intership', 0));
        array_push($data, data_get($result, 'temporary', 0));
        // dd($data);

        return response()->json($data);
    }

    public function chartReport() {

        $data = [];
        // users registered
        $numOfRegUsers = User::all()->count();
        // jobs posted
        $numOfPostedJobs = Job::all()->count();

        // employers created
        $numOfEmployers = Company::all()->count();

        // applications sent
        $numOfApplications = DB::table('job_user')->count();;

        $data['users_report'] = $numOfRegUsers;
        $data['jobs_report']  = $numOfPostedJobs;
        $data['companies_report']  = $numOfEmployers;
        $data['applications'] = $numOfApplications;

        return response()->json($data);
    }


    public function applicationChartReport() {
        $result = DB::table("job_user")
            ->select(DB::raw("MONTH(created_at) as month") ,DB::raw("(COUNT(*)) as total_applications"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();
        dd($result);
        // return response()->json($result);
    }

    public function jobseekers() {
        $result = User::where('user_type', User::TYPE_JOBSEEKER)->get();
        return view('admin.jobseeker');
    }



}
