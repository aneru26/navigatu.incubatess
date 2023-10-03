@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Grants</h1>
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
                <div class="form-group col-md-12">
                    <label >Grants Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('grants_name') }}" name="grants_name" required placeholder="Grants Name">
                    <div style="color:red">{{ $errors->first('grants_name') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label >Organization Host <span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('organization_host') }}"  name="organization_host" required placeholder="Organization Host">
                    <div style="color:red">{{ $errors->first('organization_host') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label >Deadline <span style="color: red;">*</span> </label>
                    <input type="date" class="form-control" value="{{ old ('deadline') }}" name="deadline" required placeholder="Deadline">
                    <div style="color:red">{{ $errors->first('deadline') }}</div>
                  </div>

                  

                  <div class="form-group col-md-12">
                    <label > Description<span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('description') }}" name="description" required placeholder="Description">
                    <div style="color:red">{{ $errors->first('description') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label > Requirements<span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('requirments') }}" name="requirments" required placeholder="Requirments">
                    <div style="color:red">{{ $errors->first('requirments') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label > Link of the Announcement<span style="color: red;">*</span> </label>
                    <input type="text" class="form-control" value="{{ old ('link_announcement') }}" name="link_announcement" required placeholder="Link of the Announcement">
                    <div style="color:red">{{ $errors->first('link_announcement') }}</div>
                  </div>


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