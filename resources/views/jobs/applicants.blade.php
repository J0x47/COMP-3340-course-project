@extends('layouts.main')

@section('content')
<div class="site-section bg-light">

<div class="container">
    <h1>Applicants</h1>
    <div class="row">
        <div class="col-md-12">       
        @foreach($applicants as $applicant)
          <div class="card">
            <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>
              <div class="card-body">
              @foreach($applicant->users as $user)
                <table class="table" style="width: 100%;">
                  <thead class="thead-dark">
                    <tr>
                      <td>Job title</td>
                      <td>Applicants Name</td>
                      <td>Email</td>
                      <td>Phone</td>
                      <td>Resume</td>
                      <td>Cover letter</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                <!-- <td>
                    @if($user->profile->avatar)
                        <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" width="80">
                    @else
                    <img src="{{asset('uploads/avatar/man.jpg')}}" width="80">
                    @endif

            <br>Applied on:{{ date('F d, Y', strtotime($applicant->created_at)) }}
                </td> -->
                      <td>{{$applicant->job_title}}</td>
                      <td>{{$user->full_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->profile->contact_number}}</td>
                      <td><a href="{{Storage::url($user->profile->resume)}}">Download Resume</a></td>
                      <td><a href="{{Storage::url($user->profile->cover_letter)}}">Download Cover letter</a></td>
                    </tr>
    
                  </tbody>
                </table>

                   </div><br><br>
                    @endforeach
                </div> 
                <br>
                 @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection