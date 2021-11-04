<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>users | Registration</title>

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
      <div id="company" style="display: block;">
      <p class="login-box-msg">Organisation Information</p>

       <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
        <form method="POST" action="/organisation_form">
          @csrf
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="org_name" :value="old('org_name')" placeholder="Organisation Name" required />
              <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-building"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
              <select class="form-control select2" name="type" style="width: 100%;" required> 
                <div class="input-group-append">
                  <div class="input-group-text">
                    <option value="">--Select--</option>
                @foreach ($type as $type)
                    <option value="{{$type}}">{{$type}}</option>
                @endforeach
                  </div>
                </div>
              </select>
          </div>
          <div class="input-group mb-3">
              <input type="email" class="form-control" name="company_email" :value="old('company_email')" placeholder="Company Email" required />
              <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="company_phone_no" :value="old('company_phone_no')" placeholder="Company Phone No." required />
              <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="company_address" :value="old('company_address')" placeholder="Company Address" required />
              <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="row float-right">
            <div class="col-12">
              <button type="button" onclick="myFunction()" class="btn btn-primary btn-block">Next</button>
            </div>
          </div>
        </div>
        <div id="personIncharge" style="display: none;">
          <p class="login-box-msg">Person Incharge Information</p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="first_name" :value="old('first_name')" placeholder="First Name" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="middle_name" :value="old('middle_name')" placeholder="Second Name" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="last_name" :value="old('last_name')" placeholder="Last Name" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="phone_no" :value="old('phone_no')" placeholder="Phone No." required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="address" :value="old('address')" placeholder="Address" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Your Password" name="password" autocomplete="current-password" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<script>
  function myFunction(){
    var person = document.getElementById('personIncharge');
    var org = document.getElementById('company');
    if (person.style.display === 'none' || org.style.display === 'block' ){
      person.style.display = 'block';
      org.style.display = 'none';
    }else{
      person.style.display = 'none';
      org.style.display = 'block';
    }
  }
</script>
</body>
</html>
