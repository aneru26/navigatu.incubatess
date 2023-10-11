@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
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
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old ('name',$getRecord->name) }}" required placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label >Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old ('last_name',$getRecord->last_name) }}" required placeholder="Last Name">
                  </div>
                  <div class="form-group col-md-12">
                    <label >Department</label>
                    <select class="form-control" required name="program" >
                        <option value="">Select Program</option>
                        <option {{ (old('program', $getRecord->program) == 'BSIT') ? 'selected' : ''}} value="BSIT">BSIT</option>
                        <option {{ (old('program', $getRecord->program) == 'BSIS') ? 'selected' : ''}} value="BSIS">BSIS</option>
                        <option {{ (old('program', $getRecord->program) == 'BSCS') ? 'selected' : ''}} value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>
                  <div class="form-group">
                    <label >Designation</label>
                    <input type="text" class="form-control" name="designation" value="{{ old ('designation',$getRecord->designation) }}" required placeholder="Designation">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="email" value="{{ old ('email',$getRecord->email) }}" required placeholder="Username">
                    <div style="color:red" >{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password"  placeholder="Password">
                    <div style="color:red" >{{ $errors->first('password')}}</div>
                  </div>

                  <div class="form-group">
                    <label >Pofile Pic <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                    @if(!empty($getRecord->getProfilePictureUrl()))
                      <img src="{{ $getRecord->getProfilePictureUrl() }}" style="width: auto;height: 100px;">
                    @endif

      
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