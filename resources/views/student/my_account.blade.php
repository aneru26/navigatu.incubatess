@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Personal Account</h1>
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
          @include('_message')
            <div class="card card-primary">
              
             
              <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <h3>Personal Details</h3>
                  <br>
                <div class="row">
                <div class="form-group col-md-6">
                    <label >First Name <span style="color: red;">*</span></label>
                    <input type="text" readonly="readonly" class="form-control" value="{{ old ('name', $getRecord->name) }}" name="name" required placeholder="First Name">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Last Name <span style="color: red;">*</span> </label>
                    <input type="text" readonly="readonly" class="form-control" value="{{ old ('last_name', $getRecord->last_name) }}" name="last_name" required placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('last_name') }}</div>
                  </div>

                  <div class="form-group col-md-4">
                    <label >Id Number <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('id_number', $getRecord->id_number) }}" name="id_number" required placeholder="Id Number">
                    <div style="color:red">{{ $errors->first('id_number') }}</div>
                  </div>

                  <div class="form-group col-md-4">
                    <label >Program <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="program" >
                        <option value="">Select Program</option>
                        <option {{ (old('program', $getRecord->program) == 'BSIT') ? 'selected' : ''}} value="BSIT">BSIT</option>
                        <option {{ (old('program', $getRecord->program) == 'BSIS') ? 'selected' : ''}} value="BSIS">BSIS</option>
                        <option {{ (old('program', $getRecord->program) == 'BSCS') ? 'selected' : ''}} value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>

                  <div class="form-group col-md-4">
                    <label >Gender <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="gender" >
                        <option value="">Select Gender</option>
                        <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                        <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                        <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                        <div style="color:red">{{ $errors->first('gender') }}</div>
                    </select>
                    
                  </div>

                </div>

                <br>
                <h3>Team Details</h3>
                <a href="{{ url('student/team/add_team')}}" class="nav-link @if(Request::segment(2) == 'team') active @endif">
             
            </a>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label >Team <span style="color: red;">*</span> </label>
                    <select class="form-control" readonly="readonly" required name="team_id" >
                        <option value="">Select Team</option>
                        @foreach($getClass as $value)
                        <option {{ (old('team_id', $getRecord->team_id) == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->team_name }}</option>
                        @endforeach
                    </select>
                    <div style="color:red">{{ $errors->first('team_id') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Budget <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('budget', $getRecord->budget) }}" name="budget" required placeholder="Budget">
                    <div style="color:red">{{ $errors->first('budget') }}</div>
                  </div>


                  <div class="form-group col-md-6">
                    <label >Mentor <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('mentor', $getRecord->mentor) }}" name="mentor" required placeholder="Mentor">
                    <div style="color:red">{{ $errors->first('mentor') }}</div>
                  </div>

                </div>
                <br>
                <h3>Profile Details</h3>
                <br>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label >Pofile Pic <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                    @if(!empty($getRecord->getProfilePictureUrl()))
                      <img src="{{ $getRecord->getProfilePictureUrl() }}" style="width: auto;height: 100px; padding-top:5px;">
                    @endif

      
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label >Status <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="status" >
                        <option value="">Select Status</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active</option>
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Inactive</option>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                    </select>

                </div>

            
                </div>
               
                <br>
                  <div class="form-group">
                    <label>Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old ('email',$getRecord->email) }}" required placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div style="color:red" >{{ $errors->first('password')}}</div>
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