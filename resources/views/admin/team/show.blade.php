@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
                

                <div class="text-center">
                    
                    @if(!empty($team->getProfilePictureUrl()))
                      <img src="{{ $team->getProfilePictureUrl() }}" class="rounded-circle" style="width: 100px; height: 100px;">
                    @endif

                  </div>

                  <div class="text-center">
                
                <h3><strong>{{ strtoupper($team->team_name) }}</strong></h3>
               
                  </div>
                
                  <div class="text-center">
               
               <h4> {{ strtoupper($team->startup_name ) }}</h4> 
              
                <div style="color:red">{{ $errors->first('startup_name') }}</div>
              </div>

              <div class="card">
              <div class="card-header">
                <h1 class="card-title">Member List </h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive" style="overflow:auto; ">
              <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                  
                      <th >Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Id Number</th>
                      <th>Program</th>
                      <th >Created Date</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  @if($team && $team->teamMembers)
                  @forelse($team->teamMembers as $member)
                <tr>
                    <td>
                        @if(!empty($member->profile_pic))
                            <img src="{{ asset('upload/profile/' . $member->profile_pic) }}" style="height: 50px; width: 50px; border-radius: 50px;">
                        @endif
                    </td>
                    <td>{{ $member->fname }}</td>
                    <td>{{ $member->lname }}</td>
                    <td>{{ $member->id_number }}</td>
                    <td>{{ $member->program }}</td>
                    <td>{{ date('m-d-Y, H:i A', strtotime($member->created_at)) }}</td>
                  
                </tr>
                @empty
          
                @endforelse

      @endif
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                
              </div>
              </div>
              <!-- /.card-body -->
            </div>


                </div>
                <!-- /.card-body -->

              </form>
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
    
    
  
  </div>


@endsection