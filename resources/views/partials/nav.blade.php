<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="/" class="navbar-brand">Job <strong class="font-weight-bold">Bank</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                <ul class="navbar-nav ml-auto">
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Recruiter Register') }}</a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('   Job Seeker Register') }}</a>
                  </li>
                  @endif

                  @else
                  @if(App\User::userTypeCheck(App\User::TYPE_RECRUITER))
                  <li>
                    <a href="{{route('job.create')}}"><button class="btn btn-warning">Post a job</button></a>
                  </li>
                  @endif
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->email}}</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                      @if(App\User::userTypeCheck(App\User::TYPE_RECRUITER))
                      <a class="dropdown-item" href="{{ route('company.view') }}">{{ __('Company') }}</a>
                      <a class="dropdown-item" href="{{route('my.job')}}">Myjobs</a>
                      <a class="dropdown-item" href="{{route('applicant')}}">Applicants</a>
                      @elseif(App\User::userTypeCheck(App\User::TYPE_JOBSEEKER))
                      <a class="dropdown-item" href="{{route('user.profile')}}">{{ __('Profile') }}</a>
                      <a class="dropdown-item" href="{{route('home')}}">{{ __('Saved jobs') }}</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </ul>
                  </li>

                  @endguest

                </ul>
            </div>
        </nav>


        

      </div>
    </div>
  
  
