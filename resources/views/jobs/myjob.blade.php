@extends('layouts.main')

@section('content')
<div class="site-section bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your jobs</div>

                <div class="card-body">
                    
                    <table class="table">
            
            <tbody>
                
                @foreach($jobs as $job)
                <tr>
                    <td>
                        <img src="{{asset(Auth::user()->company->logo)}}" width="80">
                    </td>
                    <td>Job Title:{{$job->job_title}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->job_type_name}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Location:{{$job->location}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">     Read
                            </button>
                        </a>
                        <br><br>
                       <a href="{{route('job.edit',[$job->id])}}"> <button class="btn btn-dark">Edit</button></a>
                        
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
