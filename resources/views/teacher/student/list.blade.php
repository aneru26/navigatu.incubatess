@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (Total : {{ $getRecord->total() }}) </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('teacher/student/add')}}" class="btn btn-primary">Add New Student</a>
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
              <form method="get" action="">
                <div class="card-body p-2">
                  <div class="row">


                <div class="form-group col-md-2">
                    <label >Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name"  placeholder="Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Team Name</label>
                    <input type="text" class="form-control" name="team" value="{{ Request::get('team') }}" placeholder="Team Name">
                  </div>

                  <div class="form-group col-md-2 ">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Email">
                  </div>

                  <div class="form-group col-md-3">
                    
                  <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search </button>
                  <a href="{{ url('admin/student/list') }}" class="btn btn-success" type="submit" style="margin-top: 31px;">Reset </a>
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
                <h3 class="card-title">Student List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow:auto; " >
                <table class="table table-striped">
                  <thead>
                    <tr>
                     
                      <th >Profile Picture</th>
                      <th>Name</th>
                      <th>Id Number</th>
                      <th>Program</th>
                      <th>Team Name</th>
                      <th>Budget</th>
                      <th>Gender</th>
                      <th>Mentor</th>
                      <th>Status</th>
                      <th>Email</th>
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
                        <td>{{  $value->name }}</td>
                        <td>{{  $value->id_number }}</td>
                        <td>{{  $value->program }}</td>
                        <td>{{  $value->team_name }}</td>
                        <td>{{  $value->budget }}</td>
                        <td>{{  $value->gender }}</td>
                        <td>{{  $value->mentor }}</td>
                        <td>{{  ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                        <td>{{  $value->email }}</td>
                        <td>{{  date('m-d-Y  H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 140px;">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('teacher/student/show/'.$value->id) }}">Show</a>
      <a class="dropdown-item" href="{{ url('teacher/student/edit/'.$value->id) }}">Edit</a>
      <a class="dropdown-item" href="{{ url('teacher/student/delete/'.$value->id) }}">Delete</a>
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