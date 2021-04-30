<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class RecruiterController extends Controller
{   

    public function __construct(){
        $this->middleware(['admin','verified']);
    }

    
    public function index(Request $request)
    {
   		if ($request->ajax()) {
        	$data = User::where('user_type', User::TYPE_RECRUITER)->latest()->get();
            return Datatables::of($data)
            	->addIndexColumn()
                ->addColumn('action', function($row){
                	$btn = '<a href="javascript:void(0)" data-url='.route("admin.ajaxRecruiter.edit", [$row->id]).' data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editUser">Edit</a>';
                	$btn = $btn.' <a href="javascript:void(0)" data-url='.route("admin.ajaxRecruiter.destroy", [$row->id]).' data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
                	return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    	return view('admin.recruiter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    	User::Create(['user_type' => 2, 'email' => $request->input('email'), 'fname' => $request->input('fname'), 'lname' => $request->input('lname')]);        
    	
    	return response()->json(['success'=>'User saved successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        User::updateOrCreate(['id' => $request->input('user_id')],
                [
                'user_type' => 2, 
                'fname' => $request->input('fname'), 
                'lname' => $request->input('lname')
            	]);        
   
        return response()->json(['success'=>'User saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

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
        User::find($id)->delete();

        return response()->json(['success'=>'User deleted successfully.']);
    }
}
