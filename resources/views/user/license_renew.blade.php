@extends('layouts.user_app')
@section('title', 'Renew | Licenses')
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Renew Licenses</li>
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
                       @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        <div class="card-header">
                          <h3 class="card-title">Renew License</h3>
                        </div>
                         
                        <form method="POST" action="/user/update_renew_license">
                        @csrf
                            <div class="card-body">
                                <input type="text" style="display: none;" value="{{ $licenses->id}}" name="licenseId">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">License Number</label>
                                   <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control" value="{{ $licenses->license_no}}" name="license_no" />
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
                                            <input type="text" disabled value="{{ $licenses->facility_name}}" class="form-control" name="health_facility_id" /> 
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Starting date</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" class="form-control"  name="starting_date" />
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Updated</button>
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
