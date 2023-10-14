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

                                <div class="form-group col-md-">
                                    <label >Birthday <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" required value="{{ old('birthday', $teamMember->birthday) }}" name="birthday"  placeholder="Birthday">
                                    <div style="color:red">{{ $errors->first('birthday') }}</div>
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
                                    <label>Program<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('program', $teamMember->program) }}" name="program" placeholder="(example:BSIT)">
                                    <div style="color:red">{{ $errors->first('program') }}</div>
                                </div>

                  <div class="form-group col-md-">
                    <label >Year  </label>
                    <select class="form-control"  name="year" >
                        <option value="">Select Year</option>
                        <option {{ (old('year', $teamMember->year) == '1') ? 'selected' : ''}} value="1">1rst Year</option>
                        <option {{ (old('year', $teamMember->year) == '2') ? 'selected' : ''}} value="2">2nd Year</option>
                        <option {{ (old('year', $teamMember->year) == '3') ? 'selected' : ''}} value="3">3rd Year</option>
                        <option {{ (old('year', $teamMember->year) == '4') ? 'selected' : ''}} value="4">4th Year</option>
                    </select>
                    <div style="color:red">{{ $errors->first('year') }}</div>
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
