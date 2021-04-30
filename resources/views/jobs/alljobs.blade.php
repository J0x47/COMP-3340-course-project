@extends('layouts.main')
@section('content')
<div class="site-section bg-light">
<div class="container">
    <div class="row" id="app">
    <form action="{{route('alljobs')}}" method="GET">

    <div class="form-inline">
        <div class="form-group">
            <label>Job Title&nbsp;</label>
            <input type="text" name="job_title" class="form-control" placeholder="job title">&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="search_type" id="search_type" value="2">
        </div>
        <div class="form-group">
            <label>Job Type &nbsp;</label>
            <select class="form-control" name="job_type">
                    <option value="">-select-</option>
                    <option value="1" selected="selected">fulltime</option>
                    <option value="2">parttime</option>
                    <option value="3">contract</option>
                    <option value="4">intership</option>
                    <option value="5">temporary</option>
                </select>
                &nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label>category</label>
            <select name="category_id" class="form-control">
                <option value="">-select-</option>
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                &nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>city</label>
            <input type="text" name="city" class="form-control" placeholder="city">&nbsp;&nbsp;
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">

        </div>
    </div>    <br>

    </form>

    <div class="col-md-12">
        <div class="rounded border jobs-wrap">
            @if(count($jobs)>0)
                @foreach($jobs as $job)

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom {{$job->job_type_name}}">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset($job->company->logo)}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->job_title}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{$job->location}}</div>
                      <div><span class="icon-money mr-1"></span>${{$job->salary}}</div>
                      <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}}</div>
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

</div>


@endsection

