@extends('layouts.main')

@section('content')
<style type="text/css">
h1,
h2,
h3,
h4,
h5,
h6 {
  color: #323232;
  margin-top: 0px;
  margin-bottom: 15px;
  font-family: 'Montserrat', sans-serif;
}

h6,
.h6 {
  margin-bottom: 12px;
  font-size: 16px;
  font-weight: 500;
  line-height: 1.4
}

.lp-font-weight-600 {
  font-weight: 600;
}

.lp-font-size-12 {
  font-size: 0.85714rem;
}

</style>
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
        <div class="col-md-12 mb-2">
          <div class="card shadow border-0 h-200">
          <img src="{{asset($company->cover_photo)}}">
          </div>
        </div>
      </div>
    </div>
    <p></p>
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <img width="100" src="{{asset($company->logo)}}">
        </div>

        <div class="col-md-6">
          <h6><b>Description:</b></h6>
          <p>{{$company->description}}</p>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header"><h6>Company Information</h6></div>
            <div class="card-body">
              <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Name:</h6> 
              <h6 class="lp-font-size-12">{{$company->cname}}</h6>
              <p>
                <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Address:</h6> 
                <h6 class="lp-font-size-12">{{$company->address}}</h6></p>
              <p>
                <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Tel:</h6> 
                <h6 class="lp-font-size-12">{{$company->tel}}</h6></p>
              <p>
                <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">website:</h6>
                <h6 class="lp-font-size-12"> 
                  <a href="http://{{$company->website}}">http://{{$company->website}}</a>
                </h6>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <table class="table">
          <tbody>
              @foreach($company->jobs as $job)
              <tr>
                  <td>
                  <img width="100" src="{{asset($company->logo)}}">
                  </td>
                  <td>Job Title:{{$job->job_title}}
                      <br>
                      <i class="fas fa-clock"aria-hidden="true"></i>&nbsp;{{$job->job_type_name}}
                  </td>
                  <td><i class="fas fa-map-marker" aria-hidden="true"></i>&nbsp;Location:{{$job->location}}</td>
                  <td><i class="fas fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                  <td>
                      <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                          <button class="btn btn-success btn-sm">     View
                          </button>
                      </a>
                  </td>
                  </tr>
              @endforeach
          </tbody>
        </table>  
      </div>
    </div>
                   
</div>
@endsection
