<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>users | Selection</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="login-logo">
    <div class="image">
         <img src="{{ asset('assets/dist/img/logo.png') }}">
       </div>
   <a href="#"><b>P</b>HAB</a>
 </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Type of Ownership</p>

    <div class="row">
        <div class="col-6">
            <p class="mb-1"> 
                <a href="/register" class="btn btn-primary btn-block">Individual</a>
            </p>
        </div>
        <div class="col-6">
            <p class="mb-1"> 
                <a href="/organisation" class="btn btn-primary btn-block">Organisation</a>
            </p>
        </div>
    </div>
  </div><!-- /.card -->
</div>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>