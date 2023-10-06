@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Competitions List (Total : {{ $getRecord->total() }})   </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('admin/competitions/add')}}" class="btn btn-outline-primary btn-sm">Add New Competition</a>
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
                <h3 class="card-title">Competition List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >
              <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                     
                      <th >Competition Name</th>
                      <th>Organization Host</th>
                      <th>Deadline</th>
                      <th>Date of Competition</th>
                      <th>Description</th>
                      <th>Requirements</th>
                      <th>Link of Announcement</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                      <tr>

                        <td>{{  $value->competition_name }}</td>
                        <td>{{  $value->organization_host }}</td>
                        <td>{{  $value->deadline }}</td>
                        <td>{{  $value->date_competition }}</td>
                        <td>{{  $value->description }}</td>
                        <td>{{  $value->requirments }}</td>
                        <td>{{  $value->link_announcement }}</td>
                        <td>{{  date('m-d-Y  H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 140px;">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('admin/competitions/edit/'.$value->id) }}">Edit</a>
      <a class="dropdown-item" href="{{ url('admin/competitions/delete/'.$value->id) }}">Delete</a>
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
    


@endsection