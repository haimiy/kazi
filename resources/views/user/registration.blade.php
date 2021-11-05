@extends('layouts.user_app')
@section('title', '')
@section('css')
    <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}"/>
  <style>

  </style>
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
              <li class="breadcrumb-item active">Health Facility Registration</li>
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
                    @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        {{ Session::get('success_message') }}
                    </div>
                    @endif
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="application-form" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="pill" href="#step1" role="tab" id="list_facility_info" >General Facility Info</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step2" role="tab" style=" cursor: not-allowed;" id="list_facility_location" >Facility Location</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step3" role="tab" style=" cursor: not-allowed;" id="list_facility_nearest" >Nearest Hospital</a>
                                    </li> 
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step4" role="tab" style=" cursor: not-allowed;" id="services_offered" >Services Offered</a>
                                    </li> 
                                </ul>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/user/app_registration_form" id="register-form">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="facility-info-tab" id="step1">
                                        <div class="card-header">
                                            <h3 class="card-title">Genearl Facility Info</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Type of Health Unit</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" onchange="other(this);" name="type_of_health_unit_id" style="width: 100%;">
                                                        <option selected="selected">--Select--</option>
                                                        @foreach ($type_of_health_unit as $type_of_health_unit)
                                                        <option value="{{$type_of_health_unit->id}}">{{$type_of_health_unit->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-group"  id="other" style="display: none;">
                                                        <label></label>
                                                        <input type="text" class="form-control" name="type_of_health_unit_specified" placeholder="Please specify type of health unit" />
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Authority responsible for establishing/ running the facility</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" onchange="authority(this);" name="authority_responsible_id" style="width: 100%;">
                                                        <option selected="selected">--Select--</option>
                                                        @foreach ($authority_responsible as $authority_responsible)
                                                        <option value="{{$authority_responsible->id}}">{{$authority_responsible->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-group"  id="authority" style="display: none;">
                                                        <label></label>
                                                        <input type="text" class="form-control" name="authority_responsible_specified" placeholder="Please specify authority responsible" />
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">What date did you expect to start operation</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" name="starting_operation_date" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Health Facility Name</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="facility_name" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Registration number (if facility previously registered) </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="reg_no" />
                                                    </div>
                                                </div>    
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Owner Name</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name='person_incharge' disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Name of Doctor Incharge</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="full_name" />
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
                                            <button type="button" data-toggle="pill" href="#step2" role="tab" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-location-tab" id="step2">
                                        <div class="card-header">
                                            <h3 class="card-title"> Facility Location</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Street</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="street" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="address" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Village</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="village" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Ward</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="ward" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">PO BOX</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="po_box" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">District Name</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="district_id" style="width: 100%;">
                                                    <option value="#">--Select--</option>
                                                    @foreach ($district as $district)                                 
                                                       <option value="{{ $district->id }}">{{ $district->name }}</option>                                     
                                                    @endforeach
                                                </select>
                                                </div>    
                                            </div>
                                        
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Region</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="region" />
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="card-footer float-left">
                                            <button type="button" data-toggle="pill" href="#step1" role="tab" class="btn btn-primary">Previous</button>
                                        </div>
                                        <div class="card-footer float-right">
                                            <button type="button" data-toggle="pill" href="#step3" role="tab" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-near-tab" id="step3">
                                        <div class="card-header">
                                            <h3 class="card-title"> Facility Nearest Hospital</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nearest Hospital Name</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nearest_hospital_name" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nearest Hospital Owner</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nearest_hospital_owner" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nearest Hospital Distance</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nearest_hospital_distance" />
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Type of Health Unit</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="nearest_hospital_type_of_health_unit" style="width: 100%;">
                                                        <option value="#">--Select--</option>
                                                       <option value="Hospital">Hospital</option>
                                                       <option value="Healt Center">Healt Center</option>
                                                       <option value="Dispensary">Dispensary</option>   
                                                       <option value="Clinic">Clinic</option>   
                                                   </select>
                                                </div>    
                                            </div>  
                                        </div>
                                        <div class="card-footer float-left">
                                            <button type="button" data-toggle="pill" href="#step2" role="tab" class="btn btn-primary">Previous</button>
                                        </div>
                                        <div class="card-footer float-right">
                                            <button type="button" data-toggle="pill" href="#step4" role="tab" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step4">
                                        <div class="card-header">
                                            <h3 class="card-title"> Services Offered</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type of Services</th>
                                                        <th>Yes</th>
                                                        <th>No</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($service as $service)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$service->name_of_services}}</td>
                                                        <td><input type="radio" value="YES" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}"></td>
                                                        <td><input type="radio" value="NO" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" checked></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>   
                                        </div>
                                        
                                        <div class="card-footer float-left">
                                            <button type="button" data-toggle="pill" href="#step3" role="tab" class="btn btn-primary">Previous</button>
                                        </div>
                                        <div class="card-footer float-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                   
                                </div>   
                            </form>
                        </div>
                      <!-- /.card-body -->
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
    <!-- BS-Stepper -->
    <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script>
         $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });
        function other(that){
            if(that.value == "8"){
                document.getElementById('other').style.display = "block";
            }else{
                document.getElementById('other').style.display = "none";
            }
        }
        function authority(that){
            if(that.value == "5"){
                document.getElementById('authority').style.display = "block";
            }else{
                document.getElementById('authority').style.display = "none";
            }
        }
        // function service_delivary(that){
        //     if(that.value == "5" || that.value == "6" || that.value == "7"){
        //         document.getElementById('service_delivary').style.display = "block";
        //     }else{
        //         document.getElementById('service_delivary').style.display = "none";
        //     }
        // }
         // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });
        </script>

        
@endsection
