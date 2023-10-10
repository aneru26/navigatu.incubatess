@extends('layouts.app')  

@section('content')

  <section class="content">

<!-- Default box -->
<div class="card">
  
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
      <h3 class="text-primary text-center border my-3 shadow-lg p-3  bg-white rounded"><i ></i> Grants</h3>
      @foreach($getRecord as $value)
        <div class="row border mt-3 shadow-lg p-3  bg-white rounded ">
          <div class="col-12">
          

              <div class="post ">
                <div class="user-block">
                 
                  <span class="username">
                    <a href="#">Grants Name:{{  $value->grants_name }} </a>
                  </span> 
                  <span class="description">Organization Host:{{$value->organization_host }} </span>
                </div>
                <!-- /.user-block -->

                
                <div class="content">
                <p>
                Deadline: {{$value->deadline }}
                  
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
      
   
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 text-center">
        <h5 class="text-primary text border my-3 shadow-lg p-3 mb-5 bg-white rounded"><i></i> Upcoming Deadline</h5>

        @foreach($upcomingDeadlines as $deadline)
                            <p class="text-muted">{{ $deadline->grants_name }} - Deadline: {{ $deadline->deadline }}</p>
          @endforeach

      
        <h5 class="text-primary border shadow-lg p-3 mb-4 bg-white rounded" ><i></i> Missed Deadline</h5>
        @foreach($missedDeadlines as $deadline)
        <p class="text-muted">{{ $deadline->grants_name }} - Deadline: {{ $deadline->deadline }}</p>

        @endforeach
        <div class="text-center mt-5 mb-3 ">
          <a href="#" class="btn btn-sm btn-primary">Add files</a>
         
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