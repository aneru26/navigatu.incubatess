@extends('layouts.app')

@section('content')
{{--
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <div class="card card-primary">

                        <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="text-center">

                                    <div class="text-right">

                                        <a href="{{ url('student/team/edit')}}" >

                                            <p>
                                                <i class="nav-icon far fa-user"></i>  Edit My Team
                                            </p>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center">
                                    @if(!empty($team->getProfilePictureUrl()))
                                    <img src="{{ $team->getProfilePictureUrl() }}" class="rounded-circle" style="width: 100px; height: 100px;">
                                    @endif
                                </div>

                                <br>
                                <div class="text-center">
                                    <h1 class="h4"><strong>{{ strtoupper($team->team_name) }}</strong></h1>
                                    <label class="h6">Team Name<span style="color: red;">*</span></label>
                                </div>

                                <div class="text-center">
                                    <h2 class="h5">{{ strtoupper($team->startup_name) }}</h2>
                                    <label class="h6">StartUp Name <span style="color: red;">*</span></label>
                                    <div style="color:red">{{ $errors->first('startup_name') }}</div>
                                </div>

                                <div class="form-group col-md">
                                    <div style="color:red">{{ $errors->first('team_document') }}</div>

                                    
                                    @if ($team->countSubmittedDocuments() > 0)
                                    <label class="h6">Submitted Documents:<span style="color: red;">*</span></label>
                                    <div class="document-row">
                                        @foreach ($team->getProfileDirect1() as $documentUrl)
                                        <div class="document-item">
                                            @if (Str::endsWith(strtolower($documentUrl), ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                            <img src="{{ $documentUrl }}" alt="Document Image" style="max-width: 100%; height: auto;">
                                            @elseif (Str::endsWith(strtolower($documentUrl), ['.pdf']))
                                            <embed src="{{ $documentUrl }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                            <a href="{{ $documentUrl }}" target="_blank">View Document</a>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>

                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>

</div>


--}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card  card-outline ">
            <div>
                            <a href="{{ url('student/team/edit') }}" class="float-right btn btn-sm btn-outline-primary rounded-pill my-3 mx-3">
                                <i class="fas fa-pencil-alt"></i> Edit My Team
                            </a>
                        </div>
              <div class="card-body box-profile shadow-lg p-3  bg-white rounded">
               
                <div class="text-center ">
                @if(!empty($team->getProfilePictureUrl()))
                                    <img src="{{ $team->getProfilePictureUrl() }}" class="rounded-circle" style="width: 100px; height: 100px;">
                                    @endif
                </div>

                <h3 class="profile-username text-center">{{ strtoupper($team->team_name) }}</h3>

                <p class="text-muted text-center">{{ strtoupper($team->startup_name) }}</p>

                <ul class="list-group list-group-unbordered mb-3 ">
                  <li class="list-group-item">
                    <b>Member 1:</b> <a class="float-right">{{ strtoupper($team->member_1) }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Member 2:</b> <a class="float-right">{{ strtoupper($team->member_2) }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Member 3:</b> <a class="float-right">{{ strtoupper($team->member_3) }}</a>
                  </li>
                </ul>

           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
         
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
