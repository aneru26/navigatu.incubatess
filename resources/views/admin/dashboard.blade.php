@extends('layouts.app')  

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $TotalAdmin}}</h3>

                <p>Total Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/admin/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalStudent}}</h3>

                <p>Total Incubatess</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/student/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $TotalTeam}}</h3>

                <p>Total Teams</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/team/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $TotalSubmission }}</h3>

                <p>Total Submission</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('admin/submission/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

{{--
  <section class="content">

<!-- Default box -->
<div class="card">
  
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        
        <div class="row">
          <div class="col-12">
          <h3 class="text-primary"><i ></i> Competitions and Grants</h3>

              <div class="post">
                <div class="user-block">
                 
                  <span class="username">
                    <a href="#">Competition Name: </a>
                  </span> 
                  <span class="description">Organization Host: - Deadline:7:45 PM today</span>
                </div>
                <!-- /.user-block -->

                <p>
                  Date Competition:
                  
                </p>
                <p>
                  Description:
                  
                </p>
                <p>
                  Requirements:
                  
                </p>

                <p>
                  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Link Announcement</a>
                </p>
              </div>

              <div class="post">
                <div class="user-block">
                 
                  <span class="username">
                    <a href="#">Competition Name: </a>
                  </span> 
                  <span class="description">Organization Host: - Deadline:7:45 PM today</span>
                </div>
                <!-- /.user-block -->

                <p>
                  Date Competition:
                  
                </p>
                <p>
                  Description:
                  
                </p>
                <p>
                  Requirements:
                  
                </p>

                <p>
                  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Link Announcement</a>
                </p>
              </div>
              <div class="post">
                <div class="user-block">
                 
                  <span class="username">
                    <a href="#">Competition Name: </a>
                  </span> 
                  <span class="description">Organization Host: - Deadline:7:45 PM today</span>
                </div>
                <!-- /.user-block -->

                <p>
                  Date Competition:
                  
                </p>
                <p>
                  Description:
                  
                </p>
                <p>
                  Requirements:
                  
                </p>

                <p>
                  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Link Announcement</a>
                </p>
              </div>

            
          </div>
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
--}}
@endsection