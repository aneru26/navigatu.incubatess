@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
                <div class="row">
                <div class="form-group col-md-6">
                    <label >First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('name') }}" name="name" required placeholder="First Name">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Last Name <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('last_name') }}" name="last_name" required placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('last_name') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Id Number <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('id_number') }}" name="id_number" required placeholder="Id Number">
                    <div style="color:red">{{ $errors->first('id_number') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Program <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="program" >
                        <option value="">Select Program</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSIS">BSIS</option>
                        <option value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Team <span style="color: red;">*</span> </label>
                    <select class="form-control name="team_id" >
                        <option value="">Select Team</option>
                        @foreach($getClass as $value)
                        <option {{( old('team_id') == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->team_name }}</option>
                        @endforeach
                       
                        <div style="color:red">{{ $errors->first('team_id') }}</div>
                    </select>
                    
                  </div>


                  <div class="form-group col-md-6">
                    <label >Budget <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('budget') }}" name="budget" required placeholder="Budget">
                    <div style="color:red">{{ $errors->first('budget') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Gender <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="gender" >
                        <option value="">Select Gender</option>
                        <option {{ (old('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                        <option {{ (old('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                        <option {{ (old('gender') == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                        <div style="color:red">{{ $errors->first('gender') }}</div>
                    </select>
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label >Mentor <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('mentor') }}" name="mentor" required placeholder="Mentor">
                    <div style="color:red">{{ $errors->first('mentor') }}</div>
                  </div>

                </div>

                  <div class="form-group col-md-6">
                    <label >Pofile Pic <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
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
             
                
                  <div class="form-group">
                    <label>Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old ('email') }}" required placeholder="Email">
                    <div style="color:red" >{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
  
  </div>


@endsection