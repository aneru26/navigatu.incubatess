@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Incubatees</h1>
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
                    <input type="text" class="form-control" required value="{{ old ('name') }}" name="name" required placeholder="First Name">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Last Name <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" required value="{{ old ('last_name') }}" name="last_name" required placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('last_name') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Id Number  </label>
                    <input type="text" class="form-control" value="{{ old ('id_number') }}" name="id_number"  placeholder="Id Number">
                    <div style="color:red">{{ $errors->first('id_number') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Program  </label>
                    <select class="form-control"  name="program" >
                        <option value="">Select Program</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSIS">BSIS</option>
                        <option value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Team <span style="color: red;">*</span> </label>
                    <select class="form-control"  name="team_id" required >
                        <option value="">Select Team</option>
                        @foreach($getClass as $value)
                        <option {{( old('team_id') == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->team_name }}</option>
                        @endforeach
                       
                        <div style="color:red">{{ $errors->first('team_id') }}</div>
                    </select>
                    
                  </div>


                  <div class="form-group col-md-6">
                    <label >Email </label>
                    <input type="email" class="form-control" value="{{ old ('budget') }}" name="budget" placeholder="Budget">
                    <div style="color:red">{{ $errors->first('budget') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Gender  </label>
                    <select class="form-control"  name="gender" >
                        <option value="">Select Gender</option>
                        <option {{ (old('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                        <option {{ (old('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                        <option {{ (old('gender') == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                        <div style="color:red">{{ $errors->first('gender') }}</div>
                    </select>
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label >Mentor  </label>
                    <input type="text" class="form-control" value="{{ old ('mentor') }}" name="mentor"  placeholder="Mentor">
                    <div style="color:red">{{ $errors->first('mentor') }}</div>
                  </div>

            

                  <div class="form-group col-md-6">
                    <label >Pofile Pic  </label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Status  </label>
                    <select class="form-control" required name="status" >
                        <option value="">Select Status</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active</option>
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Inactive</option>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                    </select>

                </div>
             

                </div>
                
                  <div class="form-group">
                    <label>Username <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="email" required value="{{ old ('email') }}" required placeholder="Username">
                    <div style="color:red" >{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
    <label>Password <span style="color: red;">*</span></label>
    <input type="password" class="form-control" name="password" required placeholder="Password" id="passwordField">
</div>

<div class="form-group">
    <input type="text" class="form-control" id="generatedPasswordField" readonly>
</div>

<!-- Add this button to generate a random password -->
<button type="button" class="btn btn-primary" id="generatePasswordButton">Generate Random Password</button>

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

  <script>
    // Function to generate a random password
    function generateRandomPassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let password = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        return password;
    }

    // Attach a click event handler to the "Generate Random Password" button
    document.getElementById('generatePasswordButton').addEventListener('click', function () {
        const passwordField = document.getElementById('passwordField');
        const generatedPasswordField = document.getElementById('generatedPasswordField');
        const randomPassword = generateRandomPassword(8); // Change the length as needed
        passwordField.value = randomPassword;
        generatedPasswordField.value = randomPassword;
    });
</script>


@endsection