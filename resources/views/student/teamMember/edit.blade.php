@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Member</h1>
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

                    <form method="post" action="{{ url('student/teamMember/edit/'.$teamMember->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group col-md-">
                                    <label>First Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('fname', $teamMember->fname) }}" name="fname" placeholder="First Name">
                                    <div style="color:red">{{ $errors->first('fname') }}</div>
                                </div>

                                <div class="form-group col-md-">
                                    <label>Last Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('lname', $teamMember->lname) }}" name="lname" placeholder="Last Name">
                                    <div style="color:red">{{ $errors->first('lname') }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Profile Pic <span style="color: red;">*</span> </label>
                                    <input type="file" class="form-control" name="profile_pic">
                                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                                
                                    @if (!empty($teamMember->profile_pic))
                                    <img src="{{ asset('upload/profile/' . $teamMember->profile_pic) }}" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                    <p>No profile picture available.</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-">
                                    <label>Id Number <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('id_number', $teamMember->id_number) }}" name="id_number" placeholder="Id Number">
                                    <div style="color:red">{{ $errors->first('id_number') }}</div>
                                </div>

                                <div class="form-group col-md-">
                    <label >Program <span style="color: red;">*</span> </label>
                    <select class="form-control"  name="program" >
                        <option value="">Select Program</option>
                        <option {{ (old('program', $teamMember->program) == 'BSIT') ? 'selected' : ''}} value="BSIT">BSIT</option>
                        <option {{ (old('program', $teamMember->program) == 'BSIS') ? 'selected' : ''}} value="BSIS">BSIS</option>
                        <option {{ (old('program', $teamMember->program) == 'BSCS') ? 'selected' : ''}} value="BSCS">BSCS</option>
                    </select>
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
@endsection
