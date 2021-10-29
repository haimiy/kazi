@extends('layouts.app')
@section('title', '')
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
              <li class="breadcrumb-item active">Health facility registration</li>
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
                  
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('success_message') }}
                                </div>
                            @endif
                            @if(Session::has('fail_message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail_message') }}
                                </div>
                            @endif
                        <div class="card-header">
                          <h3 class="card-title">Health facility registration</h3>
                        </div>
                         
                        <form method="POST" action="/admin/create_health_facility_form">
                            @csrf
                            <div class="card-body">                                                               
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Health Facility Name</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="facility_name" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Registration number </label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Name of district</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="district_name" style="width: 100%;">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($district as $district)
                                                    <option value="{{$district->name}}">{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="type_of_health_unit" style="width: 100%;">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($type_of_health_unit as $type_of_health_unit)
                                                    <option value="{{$type_of_health_unit->name}}">{{$type_of_health_unit->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Year</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" name="starting_operation_date" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Owner Name</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="full_name" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Telephone</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="phone_no" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Location</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="location" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Services Delivary</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="service_name" />
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Name of Doctor Incharge</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="doctor_incharge_name" />
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification of doctor incharge</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="qualification" />
                                                </div>
                                            </div>    
                                        </div>
                            </div>
                            <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
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
         $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });
        </script>
        
@endsection
