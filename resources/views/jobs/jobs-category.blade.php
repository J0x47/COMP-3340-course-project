@extends('layouts.main')
@section('content')

<div class="site-section bg-light">
<div class="container">
    <div class="row">
    
        <h2>{{$categoryName->name}}</h2>
            <div class="col-md-12">
        <div class="rounded border jobs-wrap">
            @if(count($jobs)>0)
                @foreach($jobs as $job)
                <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom {{$job->job_type_name}}">
                  <div class="company-logo blank-logo text-center text-md-left pl-3">
                    @if(!empty($job->company->logo))
                    <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                    @else
                    <img src="{{asset('avatar/man.jpg')}}" alt="Image" class="img-fluid mx-auto">
                    @endif
                  </div>
                  <div class="job-details h-100">
                    <div class="p-3 align-self-center">
                      <h3>{{$job->job_title}}</h3>
                      <div class="d-block d-lg-flex">
                        <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                        <div class="mr-3"><span class="icon-room mr-1"></span> {{$job->location}}</div>
                        <div><span class="icon-money mr-1"></span>${{$job->salary}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="job-category align-self-center">
                    @if($job->job_type_name=='fulltime')
                    <div class="p-3">
                      <span class="text-info p-2 rounded border border-primary">{{$job->job_type_name}}</span>
                    </div>
                    @elseif($job->job_type_name=='parttime')
                    <div class="p-3">
                      <span class="text-danger p-2 rounded border border-secondary">{{$job->job_type_name}}</span>
                    </div>
                    @elseif($job->job_type_name=='intership')
                    <div class="p-3">
                      <span class="text-danger p-2 rounded border border-success">{{$job->job_type_name}}</span>
                    </div>
                    @elseif($job->job_type_name=='contract')
                    <div class="p-3">
                      <span class="text-danger p-2 rounded border border-danger">{{$job->job_type_name}}</span>
                    </div>
                    @else
                     <div class="p-3">
                      <span class="text-warning p-2 rounded border border-warning">{{$job->job_type_name}}</span>
                    </div>
                    @endif

                    </div>  
                  </a>
              

            @endforeach
            @else
            No jobs found
            @endif


            </div>
        </div>

    {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}



    </div>
</div>
<br>
</div>

@endsection

