@extends('layouts.app')  

@section('content')

<div class="content-wrapper">
<section style="background-color: #eee;">
  <div class="container py-5 ">
    
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{ $getRecord->getProfilePictureUrl() }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$getRecord->name}} {{ $getRecord->last_name}}</h5>
            <p class="text-muted mb-1">{{$getRecord->id_number}}</p>
            <p class="text-muted mb-4">{{$getRecord->program}}</p>
            
          </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">

          <div class="row">
    <div class="col-sm-3">
        <p class="mb-0">Team Logo</p>
    </div>
    <div class="col-sm-9">
        @if ($team_logo = $getRecord->getTeamLogo())
            <img src="{{ $team_logo }}" class="rounded-circle img-fluid" style="width: 80px;" alt="Team Logo">
        @else
            <p class="text-muted mb-0">No logo available</p>
        @endif
    </div>
</div>
<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Team Name</p>
              </div>
              <div class="col-sm-9">
              <p class="text-muted mb-0">{{$getRecord->team->team_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">StartUp Name</p>
              </div>
              <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $getRecord->getStartupName() }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->gender}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Budget</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->budget}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mentor</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->mentor}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{  ($getRecord->status == 0) ? 'Active' : 'Inactive' }}</p>
              </div>
            </div>
            
          </div>
        </div>
       
      </div>
    </div>
  </div>
</section>
</div>
@endsection