<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Team List (Total : {{ $getRecord->total() }}) </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('teacher/team/add')}}" class="btn btn-outline-primary">Add New Team</a>
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
                <h3 class="card-title">Team List </h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body table-responsive" style="overflow:auto; " >
              
                <table class="table table-striped" id="myTable">
                  <thead>   
                    <tr>
                     
                      <th >Team Logo</th>
                      <th>Team Name</th>
                      <th>StartUp Name</th>
                      <th>Created By</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                    <td >
                          @if(!empty($value->getProfileDirect()))
                          <img src="{{ $value->getProfileDirect() }}" style="height: 50px; width:50px; border-radius: 50px;">
                          @endif
                        </td>
                        <td>{{ $value->team_name}}</td>
                        <td>{{ $value->startup_name}}</td>      
                        <td>{{ $value->created_by_name}}</td>
                        <td>{{  date('m-d-Y  H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 140px;">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('teacher/team/show/'.$value->id) }}">Show</a>
      <a class="dropdown-item" href="{{ url('teacher/team/edit/'.$value->id) }}">Edit</a>
      <a class="dropdown-item" href="{{ url('teacher/team/delete/'.$value->id) }}">Delete</a>
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