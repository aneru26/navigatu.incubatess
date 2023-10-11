@extends('layouts.app')

@section('content')

<div class="content-wrapper">

<section class="" style="background-color: #f4f5f7;">
  <div class="container py-5 h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-12 mb-6 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ $getRecord->getProfilePictureUrl() }}"
                alt="Avatar" class="img-fluid my-5" style="width: 150px;" />
              <h5>{{$getRecord->name}} {{ $getRecord->last_name}}</h5>
              <p>{{$getRecord->id_number}}</p>
              <p>{{$getRecord->program}}</p>
              <a href="{{ url('student/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon far fa-user" style="color: white;"></i>
              <p style="color: white;">
               Edit My Account
                
              </p>
              <a href="{{ url('student/team/edit') }}">
                <i class="nav-icon far fa-user" style="color: white;"></i>
                <p style="color: white;">
                  Edit My StartUp
                </p>
              </a>
            </a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3 pl-0">
                    <h6>Team Logo</h6>
                    <p class="text-muted"> @if ($team_logo = $getRecord->getTeamLogo())
                  <img src="{{ $team_logo }}" class="rounded-circle img-fluid" style="max-width: 80px;"
                    alt="Team Logo">
                  @else
                  <p class="text-muted mb-0">No logo available</p>
                  @endif</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Team Name</h6>
                    <p class="text-muted"> @if ($getRecord && $getRecord->team)
                            <p class="text-muted mb-0">{{$getRecord->team->team_name}}</p>
                        @else
                            <p class="text-muted mb-0">Team not found</p>
                        @endif</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Username</h6>
                    <p class="text-muted">{{$getRecord->email}}</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>StartUp Name</h6>
                    <p class="text-muted">{{ $getRecord->getStartupName() }}</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Gender</h6>
                    <p class="text-muted">{{$getRecord->gender}}</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Email</h6>
                    <p class="text-muted">{{$getRecord->budget}}</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Mentor</h6>
                    <p class="text-muted">{{$getRecord->mentor}}</p>
                  </div>

                  <div class="col-6 mb-3 pl-0">
                    <h6>Status</h6>
                    <p class="text-muted">{{  ($getRecord->status == 0) ? 'Active' : 'Inactive' }}</p>
                  </div>
                  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection