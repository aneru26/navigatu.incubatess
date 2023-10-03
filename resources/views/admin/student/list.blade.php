@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Incubatees List (Total: {{ $getRecord->total() }})</h1>
                    </div>

                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/student/add')}}" class="btn btn-outline-primary">Add New Incubatees</a>
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
                                <h3 class="card-title">Search Incubatees </h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ Request::get('search') }}" name="search"
                                                placeholder="Search ">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit">Search
                                            </button>
                                            <a href="{{ url('admin/student/list') }}"
                                                class="btn btn-outline-success btn-sm" type="submit">Reset</a>
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
                        <h3 class="card-title">Incubatees List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0 table-responsive" style="overflow:auto; ">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Profile Picture</th>
                                    <th>FName</th>
                                    <th>LName</th>
                                    <th>Team Name</th>
                                    <th>Username</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getRecord as $value)
                                    <tr>

                                        <td>
                                            @if(!empty($value->getProfileDirect()))
                                                <img src="{{ $value->getProfileDirect() }}"
                                                    style="height: 50px; width:50px; border-radius: 50px;">
                                            @endif
                                        </td>
                                        <td>{{  $value->name }}</td>
                                        <td>{{  $value->last_name }}</td>
                                        <td>{{  $value->team_name }}</td>
                                        <td>{{  $value->email }}</td>
                                        <td>{{  date('m-d-Y  H:i A', strtotime($value->created_at)) }}</td>
                                        <td style="min-width: 140px;">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ url('admin/student/show/'.$value->id) }}">Show</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('admin/student/edit/'.$value->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('admin/student/delete/'.$value->id) }}">Delete</a>
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
