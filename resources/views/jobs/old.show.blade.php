@extends('layouts.app')

@section('content')
<div class="container">
  @if(Session::has('message'))

  <div class="alert alert-success">{{Session::get('message')}}</div>
  @endif
    @if(Session::has('err_message'))

  <div class="alert alert-danger">{{Session::get('err_message')}}</div>
  @endif
  @if(isset($errors)&&count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>

  @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{$job->description}}
                    </p>
                    <p>
                        <h3>Duties</h3>
                        {{$job->roles}}
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <p>Company: <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}">{{$job->company->cname}}</a></p>
                    <p>Address: {{$job->address}}</p>
                    <p>Employment Type: {{$job->type}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>Date: {{$job->created_at->diffForHumans()}}</p>
                    <p>Last date to appply: {{date ('F d, Y', strtotime($job->last_date))}}</p>
                </div>
            </div>
            <br>
                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                       

                        @if(!$job->checkApplication())
                        
                        <apply-component :jobid={{$job->id}}></apply-component>
                        @else
                        <center><span style="color: #000;">You applied this job</span></center>
                        @endif
            <br>
                        <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}  ></favorite-component>
                        @else
                        Please login to apply this job

                        @endif
        </div>
    </div>
</div>
@endsection
