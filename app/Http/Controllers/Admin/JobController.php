<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use DataTables;

class JobController extends Controller
{   
    public function __construct(){
        $this->middleware(['admin','verified']);
    }

    public function index(Request $request)
    {
   		if ($request->ajax()) {
        	$data = Job::latest()->get();
            return Datatables::of($data)
            	->addIndexColumn()
                ->addColumn('job_status', function($row){
                    $togger = '<input type="checkbox" class="toggle-state" data-v="'.$row->status.'" data-url='.route("admin.ajaxJob.updateStatus", [$row->id]).' data-id="'.$row->id.'" checked>';
                    return $togger;
                })
                ->addColumn('action', function($row){
                	$btn = '<a href="javascript:void(0)" data-url='.route("admin.ajaxJob.edit", [$row->id]).' data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editJob">Edit</a>';
                	$btn = $btn.' <a href="javascript:void(0)" data-url='.route("admin.ajaxJob.destroy", [$row->id]).' data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJob">Delete</a>';
                	return $btn;
                })
                ->rawColumns(['job_status', 'action'])
                ->make(true);
        }

    	return view('admin.job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->all();
        if(!request()->filled('vacancy')) {
            $data['vacancy'] = 0;
        }

        if(!request()->filled('vacancy')) {
            $data['experience'] = 0;
        }

        $data['slug'] = str_slug($data['job_title']);
    	Job::Create($data);        
    	return response()->json(['success'=>'Job saved successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $job = Job::findOrFail($request->input('id'));
        $job->fill($request->all())->save();      
   
        return response()->json(['success'=>'Job saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Job::find($id);

        return response()->json($user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::find($id)->delete();

        return response()->json(['success'=>'User deleted successfully.']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateStatus(Request $request, $id)
    {
        Job::updateOrCreate(['id' => $id],
                [
                'status' => $request->input('status'),
                ]);        
    
        return response()->json(['success'=>'Job status updated successfully.']);
    }
}
