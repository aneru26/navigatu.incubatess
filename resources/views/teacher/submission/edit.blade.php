@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Submission</h1>
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
                    <label >Document Type <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->document_type }}" name="document_type" required placeholder="Document Type">
                    <div style="color:red">{{ $errors->first('document_type') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >Status <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="status" >
                        <option value="">Select Status</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Pending</option>
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Approved</option>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                    </select>

            
<!-- 
                  <div class="form-group col-md-">
                    <label >Links <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->links }}" name="links"  placeholder="Links">
                    <div style="color:red">{{ $errors->first('links') }}</div>
                  </div> -->

                  <!-- <div class="form-group col-md-">
    <label>Team Documents <span style="color: red;">*</span> </label>
    <input type="file" class="form-control" multiple value="{{ $getRecord->team_documents }}" name="team_documents[]" multiple>
    <div style="color:red">{{ $errors->first('team_documents') }}</div> -->
    
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