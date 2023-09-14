<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Navigatu</title>
  <link rel="icon" href="dist/img/navigatu.jpg" type="image/x-icon/jpg">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/adminlte.min.css')}}">

  <style>
      .login-page {
        background-image: url('dist/img/navigatu.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        
        
    }

    .login-page::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(255, 255, 255, 0.8); /* Change the background color and the opacity here */
}
#c{
  width: 100%;
  height: 100%;
  opacity: 30%;
  position: fixed;
}

.card { 
  background-color: rgba(245, 245, 245, 0.5);
  
}
    
@media (max-width: 767px) {
      /* Apply these styles only when the screen width is 767px or less (mobile view) */
      #c {
        width: 1500px; /* Adjust the canvas width as needed */
        height: 100%; /* Set an appropriate height for the canvas in mobile view */
      }
    }
  </style>
</head>
<body class="hold-transition login-page">
<canvas id = 'c'></canvas>
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card  card-outline card-primary" >
    <div class="card-header text-center">
      <a href="" class="h1"><b>Navigatu</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
    @include(' _message')

      <form action="{{ url('login') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
         <p class="mb-0">
        <a href="{{ url('register')}}" class="text-center">Register a new membership</a>
      </p> 
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
    
      </canvas>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
  
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/particles.js') }}"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>

</body>
</html>
