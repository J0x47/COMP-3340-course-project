@extends('layouts.main')

@section('content')
<div class="site-section bg-light">

<div class="container">
    <div class="row">
        <div class="col-md-3">

<img src="{{asset(Auth::user()->company->logo)}}" style="width: 100%;">

<br><br><form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update logo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="company_logo"><br>
                    <button class="btn btn-dark float-right" type="submit">Update</button>
                </div>
            </div>
        </form>


        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>


                <form action="{{route('company.store')}}" method="POST">@csrf


                <div class="card-body">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tel</label>
                        <input type="text" class="form-control" name="tel"  value="{{Auth::user()->company->tel}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website"  value="http://{{Auth::user()->company->website}}">
                    </div>
                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control" name="slogan"  value="{{Auth::user()->company->slogan}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                            <textarea name="description" class="form-control"> {{Auth::user()->company->description}}</textarea>
                        </div>

                

                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Update</button>
                    </div>

                </div>
            </div>

            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

        </div>


</form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About your company</div>
                <div class="card-body">

                    <p> name: {{Auth::user()->company->cname}}</p>

                    <p> address: {{Auth::user()->company->address}}</p>

                    <p> tel: {{Auth::user()->company->tel}}</p>

                    <p> website: <a href="{{Auth::user()->company->website}}"> {{Auth::user()->company->website}}</a></p>

                    <p>Company slogan: {{Auth::user()->company->website}}</p>
                    <p>Company page: <a href="{{route('company.index',[Auth::user()->company->id,Auth::user()->company->slug])}}">View</a></p>
                    
                </div>
            </div>
        <br>
        <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update cover photo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_photo"><br>
                    <button class="btn btn-dark float-right" type="submit">Update</button>
                </div>
            </div>
        </form>



        </div>

    </div>
</div>
</div>
@endsection

