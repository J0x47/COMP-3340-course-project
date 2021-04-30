<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use DataTables;


class ApplicationController extends Controller
{   
    public function __construct(){
        $this->middleware(['admin','verified']);
    }

    public function index(Request $request)
    {

   		if ($request->ajax()) {
            // job list with applicants
            $result = [];
            $jobs = Job::has('users')->orderBy('created_at', 'desc')->get();

            foreach($jobs as $job) {
                $data = [];
                $data['job_id'] = $job->id;
                $data['job_title'] = $job->job_title;
                $data['job_type'] = $job->job_type_name;
                $data['category'] = $job->category->name;
                $data['company'] = $job->company->cname;
                $data['location'] = $job->location;
                $data['posted_by'] = $job->posted_by_name;
                $data['due_date'] = $job->due_date;
                foreach($job->users as $user) {
                    $data['application_id'] = $user->pivot->id;
                    $data['application_name'] = $user->full_name;
                    $data['application_user_id'] = $user->id;
                    $data['application_time'] = $user->pivot->created_at->toDateTimeString();
                }
                $result[] = $data;
            }

            $collections = collect($result)->map(function($item) {return (object) $item;});
            $sorted = $collections->sortByDesc(function ($el) {return $el->application_time;});
            // dd($sorted);

            return Datatables::of($sorted)
            	->addIndexColumn()
                ->make(true);
        }

    	return view('admin.application');
    }

}
