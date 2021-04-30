<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job Bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="{{ asset('js/app.js') }}"  ></script>

    @include('partials.header')
  </head>
  <body>

  @include('partials.nav')
  @include('partials.hero')
  @include('partials.category')
  
    <div class="site-section bg-light">
      <div class="container">
        <div class="row" id="app">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Recent Jobs</h2>
            <div class="rounded border jobs-wrap">
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




            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="{{route('alljobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>

          </div>

        </div>
      </div>
    </div>

    @include('partials.footer')



    

  </body>
</html>