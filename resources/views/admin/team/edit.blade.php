@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Team</h1>
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
              
             
              <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                

                <div class="form-group col-md-">
                    <label >Team Logo <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" value="{{ $getRecord->team_logo }}" name="team_logo">
                    <div style="color:red">{{ $errors->first('team_logo') }}</div>
                    @if(!empty($getRecord->getProfilePictureUrl()))
                      <img src="{{ $getRecord->getProfilePictureUrl() }}" style="width: auto;height: 100px;">
                    @endif

                  </div>

                <div class="form-group col-md-">
                    <label >Team Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->team_name }}" name="team_name" required placeholder="Team Name">
                    <div style="color:red">{{ $errors->first('team_name') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >StartUp Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->startup_name }}" name="startup_name" required placeholder="StartUp Name">
                    <div style="color:red">{{ $errors->first('startup_name') }}</div>
                  </div>

                

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
  
  </div>


@endsection