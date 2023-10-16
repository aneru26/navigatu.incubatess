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
                

                <div class="form-group col-md-12">
                    <label >Document Type <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->document_type }}" name="document_type" required placeholder="Document Type" readonly>
                    <div style="color:red">{{ $errors->first('document_type') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label >Status <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="status" >
                        <option value="">Select Status</option>
                        <option {{ (old('status', $getRecord->status) == '0') ? 'selected' : '' }} value="0">Pending</option>

                        <option {{ (old('status', $getRecord->status) == '1') ? 'selected' : '' }} value="1">Approved</option>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                    </select>

    
</div>

<div class="form-group col-md-12">
    <label>Comment <span style="color: red;">*</span></label>
    <textarea class="form-control" name="comment" placeholder="Comment">{{ $getRecord->comment }}</textarea>
    <div style="color:red">{{ $errors->first('comment') }}</div>
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