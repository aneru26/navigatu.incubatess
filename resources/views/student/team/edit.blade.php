@extends('layouts.app')  

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ">
            <h1>Edit My StartUp  </h1> 
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
                
                <h3>Team Details</h3>

                <div class="form-group col-md">
    <label>Team Logo <span style="color: red;">*</span></label>
    <input type="file" class="form-control" value="{{ $team->team_logo }}" name="team_logo">
    <div style="color:red">{{ $errors->first('team_logo') }}</div>
    
    @if(!empty($team->getProfilePictureUrl()))
        <img src="{{ $team->getProfilePictureUrl() }}" style="width: auto;height: 100px;">
    @endif
</div>

<div class="form-group col-md">
    <label>Team Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ $team->team_name }}" name="team_name" required placeholder="Team Name">
    <div style="color:red">{{ $errors->first('team_name') }}</div>
</div>
<br>
                <h3>StartUp Details</h3>
<div class="form-group col-md">
    <label>StartUp Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ $team->startup_name }}" name="startup_name" required placeholder="StartUp Name">
    <div style="color:red">{{ $errors->first('startup_name') }}</div>
</div>

<br>
                <h3>Document Details</h3>
                <div class="form-group col-md-">
                    <label >Document Type <span style="color: red;">*</span> </label>
                    <select class="form-control"  name="document_type" >
                        <option  value="">Select Document</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Work Plan') ? 'selected' : ''}} value="Work Plan">Work Plan</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Progress Report') ? 'selected' : ''}} value="Progress Report">Progress Report</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Primer Profile') ? 'selected' : ''}} value="Primer Profile">Primer Profile</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Pitch Deck') ? 'selected' : ''}} value="Pitch Deck">Pitch Deck</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Briefer') ? 'selected' : ''}} value="Briefer">Briefer</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Flyers') ? 'selected' : ''}} value="Flyers">Flyers</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Promotional Tarp') ? 'selected' : ''}} value="Promotional Tarp">Promotional Tarp</option>
                        <option {{ (old('document_type', $errors->document_type) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                    </select>
                    <div style="color:red">{{ $errors->first('document_type') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label >Other Links <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('link') }}" name="link"  placeholder="Url Links">
                    <div style="color:red">{{ $errors->first('links') }}</div>
                  </div>

<div class="form-group col-md">
    <label>Team Document <span style="color: red;">*</span></label>
    <input type="file" class="form-control" multiple name="team_documents[]" multiple>
    <div style="color:red">{{ $errors->first('team_document') }}</div>
    <div>Total submitted documents: {{ $team->countSubmittedDocuments() }}</div>
</div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

                @include(' _message')
              </form>
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
  
  </div>


@endsection