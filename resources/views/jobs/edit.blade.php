@extends('layouts.main')

@section('content')
<div class="site-section bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <br>
            <div class="card">
            <div class="card-header">Update a job</div>
            <div class="card-body">
            <form action="{{route('job.update',[$job->id])}}" method="POST">@csrf
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" class="form-control {{ $errors->has('job_title') ? ' is-invalid' : '' }}"  value="{{ $job->job_title}}">
                @if ($errors->has('job_title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job_title') }}</strong>
                </span>
                 @endif
                
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>
            
            <div class="form-group">
                <label for="region_id">Region (Province):</label>
                <select name="region_id" class="form-control">
                    @foreach(App\Region::all() as $rg)
                        <option value="{{$rg->id}}" {{$rg->id==$job->region_id?'selected':''}}>{{$rg->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  value="{{$job->city->name}}">
                <input type="hidden" name="city_id" value="{{ $job->city->id}}">
                @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
                 @endif
            </div>


            <div class="form-group">
                <label for="vacancy">No of vacancy:</label>
                <input type="text" name="vacancy" class="form-control{{ $errors->has('vacancy') ? ' is-invalid' : '' }}"  value="{{ $job->vacancy }}">
                @if ($errors->has('vacancy'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('vacancy') }}</strong>
                </span>
                 @endif
            </div>

             <div class="form-group">
                <label for="experience">Year of experience:</label>
                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ $job->experience }}">
                @if ($errors->has('experience'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('experience') }}</strong>
                </span>
                 @endif
            </div>

              <div class="form-group">
                <label for="gender">Gender:</label>
                
                 <select class="form-control" name="gender">
                    <option value="fulltime"{{$job->gender=='any'?'selected':''}}>Any</option>
                    <option value="partime"{{$job->gender=='male'?'selected':''}}>Male</option>
                    <option value="casual"{{$job->gender=='female'?'selected':''}}>Female</option>
                </select>
            </div>

               <div class="form-group">
                <label for="salary">Salary/year:</label>
                <select class="form-control" name="salary">
                    <option value="negotiable">Negotiable</option>
                    <option value="2000-5000">2000-5000</option>
                    <option value="50000-10000">5000-10000</option>
                    <option value="10000-20000">10000-20000</option>
                    <option value="30000-500000">50000-500000</option>
                    <option value="500000-600000">500000-600000</option>

                    <option value="600000 plus">600000 plus</option>
                </select>
            </div>

            <div class="form-group">
                <label for="job_type">Job Type:</label>
                <select class="form-control" name="job_type">
                    <option value="1" {{$job->job_type==1 ? 'selected':''}}>fulltime</option>
                    <option value="2" {{$job->job_type==2 ? 'selected':''}}>parttime</option>
                    <option value="3" {{$job->job_type==3 ? 'selected':''}}>contract</option>
                    <option value="4" {{$job->job_type==4 ? 'selected':''}}>intership</option>
                    <option value="5" {{$job->job_type==5 ? 'selected':''}}>temporary</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                <option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
                <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>
                </select>
            </div>
            <div class="form-group">
                <label for="due_date">Due date:</label>
                <input type="text" id="datepicker" name="due_date" class="form-control {{ $errors->has('due_date') ? ' is-invalid' : '' }}"  value="{{ $job->due_date }}">
                @if ($errors->has('due_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('due_date') }}</strong>
                </span>
                 @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
             



        </div>
    </form>
    </div>
    </div>
    </div>
</div>
</div>
@endsection

