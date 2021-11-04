@extends('layouts.user_app')
@section('title', 'Create | Licenses')
@section('css')
    
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h3>User Registration Form</h3> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Licenses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                      <!-- Validation Errors -->
                  @if($errors->any())
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                      </div>
                  @endif
                  @if(Session::has('message'))
                      <div class="alert alert-success">
                          {{ Session::get('message') }}
                      </div>
                  @endif
                        <div class="card-header">
                          <h3 class="card-title">Create License</h3>
                        </div>
                         
                        <form method="POST" action="/user/license_create_form">
                        @csrf
                            <div class="card-body">
                               <form action="">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Type of Licenses</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="license_type" />
                                                <label class="form-chek-label">New</label>
                                            </div>
                                            <div class="form-check" >
                                                <input type="radio" onclick="myFunction()" class="form-check-input" name="license_type" />
                                                <label class="form-chek-label">Renew</label>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div style="display: none;" id="license_number">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">License No.</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="license_no" />
                                        </div>
                                    </div>    
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Owner Name.</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" name="owner_id" />
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Health Facility Name</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" disabled value="{{ $health_facility[0]->facility_name}}" class="form-control" name="health_facility_id" />
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Starting date</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="health_facility_id" />
                                        </div>
                                    </div>    
                                </div>
                                
                               </form>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>   
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
 
@endsection

@section('js')
<script>
    function myFunction(){
      var license = document.getElementById('license_number');
      if (license.style.display === 'none' ){
        license.style.display = 'block';
      }else{
        license.style.display = 'none';
      }
    }
  </script> 
@endsection
