@extends('layouts.app')  

@section('content')
 {{-- 
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
            <a href="{{ url('admin/competitions/add')}}" class="btn btn-primary">Add New Competition</a>
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
                <h3 class="card-title">Search Competitions</h3>
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
                  <a href="{{ url('admin/competitions/list') }}" class="btn btn-success" type="submit" style="margin-top: 31px;">Reset </a>
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
                <h3 class="card-title">Competition List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow:auto; " >
              <table class="table table-striped">
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
    <a class="dropdown-item" href="{{ url('admin/competitions/show/'.$value->id) }}">Show</a>
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
    
--}}


  <section class="content">

<!-- Default box -->
<div class="card">
  
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
      <h3 class="text-primary"><i ></i> Competitions</h3>
      @foreach($getRecord as $value)
        <div class="row">
          <div class="col-12">
          

              <div class="post">
                <div class="user-block">
                 
                  <span class="username">
                    <a href="#">Competition Name:{{  $value->competition_name }} </a>
                  </span> 
                  <span class="description">Organization Host:{{$value->organization_host }}- Deadline:{{$value->deadline }}</span>
                </div>
                <!-- /.user-block -->

                
                <div class="content">
                <p>
                  Date Competition: {{  $value->date_competition }}
                  
                </p>
                <p>
                  Description:{{  $value->description }}
                  
                </p>
                <p>
                  Requirements:{{  $value->requirments }}
                  
                </p>

                <p>
                  <a href=" {{  $value->link_announcement }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{  $value->link_announcement }}</a>
                </p>
              </div>

              </div>
              </div>
        </div>
              
              @endforeach
              <div style="padding: 10px; float:right;">
                
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
 </div>
             
         
      </div>
      
   
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"><i></i> Due Date</h3>
        <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
        <br>
        <div class="text-muted">
          <p class="text-sm">Client Company
            <b class="d-block">Deveint Inc</b>
          </p>
          <p class="text-sm">Project Leader
            <b class="d-block">Tony Chicken</b>
          </p>
        </div>

        <h5 class="mt-5 text-muted">Project files</h5>
        <ul class="list-unstyled">
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
          </li>
        </ul>
        <div class="text-center mt-5 mb-3">
          <a href="#" class="btn btn-sm btn-primary">Add files</a>
          <a href="#" class="btn btn-sm btn-warning">Report contact</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>

@endsection