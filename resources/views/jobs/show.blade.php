@extends('layouts.main')
@section('content')

<style type="text/css">

img {
  max-width: 100%;
}

/* Navbar */
.site-navbar-wrap {
  margin-bottom: 10px;
  padding: 0px 0;
}

/* Header image */
.header-image {
    height: 100px; 
    flex: 0 0 100px;
    margin-right: 35px;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 3px 12px rgba(0,0,0,.1);
    display: flex;
    padding: 0 10px;
}
.header-image img {
    align-self: center;
    transform: translate3d(0,0,0);
}

/*------------------------------------
  Background Image Style
------------------------------------*/
.lp-bg-img-hero {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
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

/* P */
.lp-py-20 {
  padding-top: 1.42857rem;
  padding-bottom: 1.42857rem;
}

/* P */
.lp-py-40--sm {
  padding-top: 2.85714rem;
  padding-bottom: 2.85714rem;
}

.lp-position--rel {
  position: relative;
}


.job-desc p, li {
  color: #6c757d!important;
}

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
   <div class="lp-py-30 lp-py-50--md">

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
          <div class="col-lg-12">
            <img src="{{asset($job->company->cover_photo)}}" style="width: 100%;">
          </div>
         </div>
          <div class="row" id="app">
           <div class="lp-position--rel lp-z-index-3">
            <div class="container">
              <div class="media mb-4 mt-2">
                <div class="header-image">
                  <img src="{{asset($job->company->logo)}}" alt="">
                </div>
                <div class="media-body">
                  <h3 class="mt-4 mb-1"><b>{{$job->job_title}}</b></h3>
                  <h5 class="text-secondary">{{$job->company->cname}}</h5>
                
            </div>
              </div>
            </div>
           </div>

             <div class="col-lg-8 job-desc mt-4">
               <h6><b>Job Description</b></h6>
               <p>{!! nl2br(e($job->description)) !!}</p>
               

              </div>
              

             <div class="col-lg-4 mt-4">
              <div class="widgets lp-mt-30 lp-mt-30 lp-mt-0--lg">
                <p>
                  <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a>
                </p>
                <p>
                  @guest
                  Please login to apply this job
                  @else
                  @if(Auth::check()&&Auth::user()->user_type==App\User::TYPE_JOBSEEKER)
                    @if(!$job->checkApplication())
                    <apply-component :jobid={{$job->id}}></apply-component>
                    @else
                    <center>
                      <span style="color: #000;">You applied this job</span>
                    </center>
                    @endif
                    <br>
                    <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}>
                    </favorite-component>
                  @endif
                  @endguest
                </p>

              </div>

               <div class="widgets lp-mt-30 lp-mt-30">
                 <div class="card ">
                   <div class="card-header">
                     <h6 class="mb-0"><b>Job Summary</b></h6>
                   </div>
                   <div class="card-body">
                     <div class="media">
                       <i class="la la-map-marker lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Location</h6>
                         <h6 class="lp-font-size-12">{{$job->location}}</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-suitcase lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Job Type</h6>
                         <h6 class="lp-font-size-12">{{$job->job_type_name}}</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-money lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Salary</h6>
                         <h6 class="lp-font-size-12">${{$job->salary}}</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-bolt lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">vacancy</h6>
                         <h6 class="lp-font-size-12">{{$job->vacancy }}</h6>
                       </div>
                     </div>

                     <div class="media">
                       <i class="la la-bolt lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Experience</h6>
                         <h6 class="lp-font-size-12">{{$job->experience}}&nbsp;years</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-clock-o lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Posted</h6>
                         <h6 class="lp-font-size-12">{{$job->created_at->diffForHumans()}}</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-clock-o lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Due Date</h6>
                         <h6 class="lp-font-size-12">{{ date('F d, Y', strtotime($job->due_date)) }}</h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-globe lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Website</h6>
                         <h6 class="lp-font-size-12"><a href="http://{{$job->company->website}}">http://{{$job->company->website}}</a></h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-envelope lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Email</h6>
                         <h6 class="lp-font-size-12"><a href = "mailto: {{$job->company->email}}">{{$job->company->email}}</a></h6>
                       </div>
                     </div>
                     <div class="media">
                       <i class="la la-mobile-phone lp-pr-10 lp-color-blue lp-font-size-22"></i>
                       <div class="media-body">
                         <h6 class="mb-2 lp-font-weight-600 lp-font-size-12">Tel:</h6>
                         <h6 class="lp-font-size-12">{{$job->company->tel}}</h6>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

</div>
       

<br>
<br>
<br>

     </div>
   </div>
@endsection
