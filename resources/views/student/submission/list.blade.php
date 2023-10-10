@extends('layouts.app')  

@section('content') 
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Submission List </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('student/submission/add')}}" class="btn btn-outline-primary btn-sm">
              Add New Submission</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Submission List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >
              <table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th>Document Type</th>
            <th>Other Links</th>
            <th>Documents</th>
            <th>Status</th>
            <th>Comment</th>
            
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
            <td>{{  ($value->status == 0) ? 'Pending' : 'Approved' }}
            <td>{{ $value->comment }}</td>
            <td>{{ date('m-d-Y ', strtotime($value->created_at)) }}</td>
            <td style="min-width: 140px;">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('student/submission/edit/'.$value->id) }}">Edit</a>
                        <a class="dropdown-item" href="{{ url('student/submission/delete/'.$value->id) }}">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                <div style="padding: 10px; float:right;">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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