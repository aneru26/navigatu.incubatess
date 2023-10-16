@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card  card-outline ">
            <div>
                            <a href="{{ url('student/team/edit') }}" class="float-right btn btn-sm btn-outline-primary rounded-pill my-3 mx-3">
                                <i class="fas fa-pencil-alt"></i> Edit My Team
                            </a>
                        </div>
              <div class="card-body box-profile shadow-lg p-3  bg-white rounded">
               
              @include(' _message')
              
              <div class="text-center">
                @if($team && !empty($team->getProfilePictureUrl()))
                    <img src="{{ $team->getProfilePictureUrl() }}" class="rounded-circle" style="width: 100px; height: 100px;">
                @endif
            </div>
            

            <div class="text-center">
              @if($team)
                  <h3 class="profile-username text-center">{{ strtoupper($team->team_name) }}</h3>
                  <p class="text-muted text-center">{{ strtoupper($team->startup_name) }}</p>
              @else
                  <p>Team information not found</p>
              @endif
          </div>
          

                <ul class="list-group list-group-unbordered mb-3 ">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Member List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive" style="overflow:auto; ">
              <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                  
                      <th >Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Birthday</th>
                      <th>Id Number</th>
                      <th>Program</th>
                      <th>Year</th>
                      <th >Created Date</th>
                      <th >Action</th>
                     
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
                    <td>{{ date('F j, Y', strtotime($member->birthday)) }}</td>
                    <td>{{ $member->id_number }}</td>
                    <td>{{ $member->program }}</td>
                    <td>{{ $member->year }}</td>
                    <td>{{ date('m-d-Y', strtotime($member->created_at)) }}</td>
                    <td style="min-width: 140px;"> 
                    <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('student/teamMember/edit/'.$member->id) }}">Edit</a>
      <a class="dropdown-item" href="#" onclick="confirmDelete('{{ $member->id }}')">Delete</a>
    </div>
</div>
</td>
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
                </ul>

           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
         
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <script>
    function confirmDelete(memberId) {
        if (confirm('Are you sure you want to delete this member?')) {
            window.location.href = "{{ url('student/teamMember/delete/') }}/" + memberId;
        }
    }
</script>
@endsection
