@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Member</h1>
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
              
             
              <form method="post" action="{{ url('student/teamMember/add') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                

                  <div class="form-group col-md-">
                    <label >First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" required value="{{ old ('fname') }}" name="fname"  placeholder="First Name">
                    <div style="color:red">{{ $errors->first('fname') }}</div>
                  </div>

                  
                  <div class="form-group col-md-">
                    <label >Last Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" required value="{{ old ('lname') }}" name="lname"  placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('lname') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >Birthday <span style="color: red;">*</span></label>
                    <input type="date" class="form-control" required value="{{ old ('birthday') }}" name="birthday"  placeholder="Birthday">
                    <div style="color:red">{{ $errors->first('birthday') }}</div>
                  </div>

                  <div class="form-group">
                    <label >Pofile Pic <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >Id Number <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" required value="{{ old ('id_number') }}" name="id_number"  placeholder="Id Number">
                    <div style="color:red">{{ $errors->first('id_number') }}</div>
                  </div>

                  
                  <div class="form-group col-md-">
                    <label >Program  </label>
                    <select class="form-control" required name="program" >
                        <option value="">Select Program</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSIS">BSIS</option>
                        <option value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>

                  <div class="form-group col-md-">
                  <label >Year  </label>
                  <select class="form-control"  name="year" >
                      <option value="">Select Year</option>
                      <option value="1">1rst Year</option>
                      <option value="2">2nd Year</option>
                      <option value="3">3rd Year</option>
                      <option value="4">4th Year</option>
                  </select>
                  <div style="color:red">{{ $errors->first('year') }}</div>
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