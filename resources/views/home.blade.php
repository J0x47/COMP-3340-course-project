@extends('layouts.main')

@section('content')
<style type="text/css">
/* Navbar */
.site-navbar-wrap {
  margin-bottom: 10px;
  padding: 0px 0;
}

/* P */
.lp-py-30 {
  padding-top: 2.14286rem;
  padding-bottom: 2.14286rem;
}

/* P */
.lp-py-50--md {
  padding-top: 3.67143rem;
  padding-bottom: 3.67143rem;
}

</style>
<div class="lp-py-30 lp-py-50--md">

    <div class="container">
        <div class="row justify-content-center" id="app">
            <div class="col-md-10">
                @if(Auth::user()->user_type==App\User::TYPE_JOBSEEKER)
                @if(count($jobs)>0)
                <h2>Your saved job.</h2>
                @foreach($jobs as $job)
                <div class="card">
                    <div class="card-header">{{$job->job_title}}</div>
                    <div class="card-body">  
                        <small class="badge badge-success">{{$job->job_title}}
                    </small>

                       <p> {!! nl2br(e($job->description)) !!}</p>
                    </div>
                    <div class="card-footer">
                        <span><a href="{{route('jobs.show',[$job->id,$job->slug])}}">Read</a></span>
                        <span class="float-right">Due date:{{$job->due_date}}</span>
                    </div>

                </div>
                <br>
                @endforeach

                @else
                you have not favourited any jobs to show.
                <a href="/">Find Jobs</a>
                @endif

                @else
                
                You're logged in 


                @endif
            </div>
        </div>
    </div>

</div>
@endsection
