@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Submission</h1>
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
              
             
              <form method="post" action="{{ url('admin/submission/add') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                

                  <div class="form-group col-md-">
                    <label >Document Type <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="document_type" >
                    <option value="">Select Document</option>
                        <option value="Work Plan">Work Plan</option>
                        <option value="Progress Report">Progress Report</option>
                        <option value="Primer Profile">Primer Profile</option>
                        <option value="Pitch Deck">Pitch Deck</option>
                        <option value="Briefer">Briefer</option>
                        <option value="Flyers">Flyers</option>
                        <option value="Promotional Tar">Promotional Tarp</option>
                        <option value="Other">Other</option>
                    </select>
                    <div style="color:red">{{ $errors->first('document_type') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >Other Links <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('links') }}" name="links"  placeholder="Links">
                    <div style="color:red">{{ $errors->first('links') }}</div>
                  </div>

                  <div class="form-group col-md-">
                    <label >Team Document <span style="color: red;">*</span> </label>
                    <input type="file" class="form-control" name="team_documents[]" multiple>
                    <div style="color:red">{{ $errors->first('team_document') }}</div>
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