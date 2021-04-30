<!DOCTYPE html>
<html>
<head>
    <title>Job Bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('../partials.header')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
    @include('../partials.nav')

<div class="site-section bg-light">
<div class="container">

    <div class="row justify-content-center" id="app">

        <div class="col-md-8">
            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
            <div class="card-header">Create a job</div>
            <div class="card-body">

            <form action="{{route('job.store')}}" method="POST">@csrf

            <div class="form-group">
                <label for="job_title">Title:</label>
                <input type="text" name="job_title" class="form-control {{ $errors->has('job_title') ? ' is-invalid' : '' }}"  value="{{ old('job_title') }}">
                @if ($errors->has('job_title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job_title') }}</strong>
                </span>
                 @endif
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
            <textarea name="description" id="summernote" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                 @endif
            </div>

        
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>
        


            <div class="form-group">
                <label for="vacancy">No of vacancy:</label>
                <input type="text" name="vacancy" class="form-control{{ $errors->has('vacancy') ? ' is-invalid' : '' }}"  value="{{ old('vacancy') }}">
                @if ($errors->has('vacancy'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('vacancy') }}</strong>
                </span>
                 @endif
            </div>

             <div class="form-group">
                <label for="experience">Year of experience:</label>
                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience') }}">
                @if ($errors->has('experience'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('experience') }}</strong>
                </span>
                 @endif
            </div>

              <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender">
                    <option value="any">Any</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
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
                <label for="region_id">Region (Province):</label>
                <select name="region_id" class="form-control" required>
                    @foreach(App\Region::all() as $rg)
                        <option value="{{$rg->id}}">{{$rg->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
                 @endif
            </div>

 

            <div class="form-group">
                <label for="job_type">Job Type:</label>
                <select class="form-control" name="job_type">
                    <option value="1">fulltime</option>
                    <option value="2">parttime</option>
                    <option value="3">contract</option>
                    <option value="4">intership</option>
                    <option value="5">temporary</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1">live</option>
                    <option value="0">draft</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="due_date">Due date:</label>
                <input id="datepicker"  name="due_date" class="form-control {{ $errors->has('due_date') ? ' is-invalid' : '' }}" >
                @if ($errors->has('last_date'))
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

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
</script>


</body>
</html>



