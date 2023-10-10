@extends('layouts.app')  

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ">
            <h1>Edit My Team  </h1> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
           
            <div class="card card-primary">
            <div class="col-sm-12 pt-2" style="text-align:right;">
            <a href="{{ url('student/teamMember/add')}}" class="btn btn-outline-primary btn-sm">Add New Member</a>
          </div>
             
              <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                
                <h3>Team Details</h3>

                <div class="form-group col-md">
    <label>Team Logo <span style="color: red;">*</span></label>
    <input type="file" class="form-control" value="{{ $team->team_logo }}" name="team_logo">
    <div style="color:red">{{ $errors->first('team_logo') }}</div>
    
    @if(!empty($team->getProfilePictureUrl()))
        <img src="{{ $team->getProfilePictureUrl() }}" style="width: auto;height: 100px;">
    @endif
</div>

<div class="form-group col-md">
    <label>Team Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ $team->team_name }}" name="team_name"  placeholder="Team Name">
    <div style="color:red">{{ $errors->first('team_name') }}</div>
</div>
<br>
                <h3>StartUp Details</h3>
<div class="form-group col-md">
    <label>StartUp Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ $team->startup_name }}" name="startup_name" placeholder="StartUp Name">
    <div style="color:red">{{ $errors->first('startup_name') }}</div>
</div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

                @include(' _message')
              </form>
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
  
  </div>


@endsection