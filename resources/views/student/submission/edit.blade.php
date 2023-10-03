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
                    <label >Document Type <span style="color: red;">*</span> </label>
                    <select class="form-control" required name="document_type" >
                        <option value="">Select Document</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Work Plan') ? 'selected' : ''}} value="Work Plan">Work Plan</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Progress Report') ? 'selected' : ''}} value="Progress Report"> Progress Report</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Primer Profile') ? 'selected' : ''}} value="Primer Profile"> Primer Profile</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Pitch Deck') ? 'selected' : ''}} value="Pitch Deck"> Pitch Deck</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Briefer') ? 'selected' : ''}} value="Briefer"> Briefer</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Flyers') ? 'selected' : ''}} value="Flyers"> Flyers</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Promotional Tarp') ? 'selected' : ''}} value="Promotional Tarp"> Promotional Tarp</option>
                        <option {{ (old('document_type', $getRecord->document_type) == '"Other') ? 'selected' : ''}} value="Other"> Other</option>
                       
                        
                    </select>
                    <div style="color:red">{{ $errors->first('document_type') }}</div>
                  </div>
                


                  <div class="form-group col-md-">
                    <label >Links <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $getRecord->links }}" name="links" placeholder="Links">
                    <div style="color:red">{{ $errors->first('links') }}</div>
                  </div>

                  <div class="form-group col-md-">
    <label>Team Documents <span style="color: red;">*</span> </label>
    <input type="file" class="form-control" value="{{ $getRecord->team_documents }}" name="team_documents[]" multiple>
    <div style="color:red">{{ $errors->first('team_documents') }}</div>
    
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