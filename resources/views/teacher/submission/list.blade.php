@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Submission List  </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
           
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
           
            <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
              <form method="get" action="" >
                <div class="card-body p-2 ">
                  <div class="row">


                
                  <div class="form-group col-md-3">
    <label>Created By</label>
    <input type="text" class="form-control" value="{{ Request::get('created_by') }}" name="created_by" placeholder="Created By">
</div>



                  <div class="form-group col-md-3">
                    
                  <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search </button>
                  <a href="{{ url('teacher/submission/list') }}" class="btn btn-success" type="submit" style="margin-top: 31px;">Reset </a>
                  </div>

                  </div>
                </div>
              </form>
             </div>     
          </div>    
         </div>

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Submission List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow:auto; " >
              <table class="table table-striped">
    <thead>
        <tr>
            <th>Document Type</th>
            <th>Other Links</th>
            <th>Documents</th>
            <th>Status</th>
            <th>Submitted By</th>
            <th>Submitted Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($getRecord as $value)
        <tr>
            <td>{{ $value->document_type }}</td>
            <td>{{ $value->links }}</td>
            <td>
                @if(!empty($value->getProfileDirect1()))
                    <select id="documentDropdown" onchange="viewDocument(this)">
                        <option value="">Select Document</option>
                        @foreach($value->getProfileDirect1() as $documentUrl)
                            @php
                                $fileExtension = pathinfo($documentUrl, PATHINFO_EXTENSION);
                            @endphp
                            <option value="{{ $documentUrl }}">{{ strtoupper($fileExtension) }} Document</option>
                        @endforeach
                    </select>
                @endif
            </td>
            <td>{{  ($value->status == 0) ? 'Pending' : 'Approved' }} </td>
            <td>{{ $value->created_by_name }} {{ $value->last_name }}</td>
            <td>{{ date('m-d-Y H:i A', strtotime($value->created_at)) }}</td>
            <td style="min-width: 140px;">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="{{ url('admin/submission/edit/'.$value->id) }}">Edit</a>
                        <a class="dropdown-item" href="{{ url('admin/submission/delete/'.$value->id) }}">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                <div style="padding: 10px; float:right;">
              
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section> 
  </div>
  <!-- /.content-wrapper -->
    
  <script>
    function viewDocument(selectElement) {
        var selectedDocument = selectElement.value;
        
        if (selectedDocument) {
            window.open(selectedDocument, '_blank');
        }
    }
</script>


@endsection