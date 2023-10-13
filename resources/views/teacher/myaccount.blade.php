{{-- @extends('layouts.app')  

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
            <a href="{{ url('teacher/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
               Edit My Account
                
              </p>
            </a>
          </div>
        </div>
   
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Designation</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->designation}}</p>
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
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{  ($getRecord->status == 0) ? 'Active' : 'Inactive' }}</p>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection --}}

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
              <a href="{{ url('teacher/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon far fa-user" style="color: white;"></i>
              <p style="color: white;">
               Edit My Account
                
              </p>
            </a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-12 mb-3 ">
                    <h6>Email</h6>
                    <p class="text-muted">{{$getRecord->email}}</p>
                  </div>

                  <div class="row pt-1">
                  <div class="col-12 mb-3">
                    <h6>Designation</h6>
                    <p class="text-muted">{{$getRecord->designation}}</p>
                  </div>
                  
                  <div class="row pt-1">
                  <div class="col-12 mb-3 pl-3">
                    <h6>Active</h6>
                    <p class="text-muted">{{  ($getRecord->status == 0) ? 'Active' : 'Inactive' }}</p>
                  </div>
                </div>
                
                <hr class="mt-0 mb-4">
               
                
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