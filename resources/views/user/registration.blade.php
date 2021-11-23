@extends('layouts.user_app')
@section('title', '')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}" />

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
                                      <a class="nav-link active" data-toggle="pill" href="#step1" role="tab" id="tab-btn-1" >General Facility Info</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step2" role="tab" id="tab-btn-2" >Facility Location</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step3" role="tab" id="tab-btn-3" >Nearest Hospital</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step4" role="tab" id="tab-btn-4" >Services Offered</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step5" role="tab" id="tab-btn-5" >Staffing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step6" role="tab" id="tab-btn-6" >Premises</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step7" role="tab" id="tab-btn-7" >Number of Beds</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step8" role="tab" id="tab-btn-8" >Other</a>
                                    </li>
                                </ul>
                        </div>
                        <div class="card-body">
                            <form action="/user/store_applicant_registration_form" method="POST">
                                @csrf
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="facility-info-tab" id="step1">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Type of Health Unit</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2" onchange="other(this);" name="type_of_health_unit_id" style="width: 100%;">
                                                            <option selected="selected">--Select--</option>
                                                            @foreach ($type_of_health_units as $type_of_health_unit)
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
                                                            @foreach ($authorities as $authority)
                                                            <option value="{{$authority->id}}">{{$authority->name}}</option>
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
                                                            @if(auth()->user()->owner->ownership_type == 'Solo')
                                                            <input type="text" name='person_incharge' disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" />
                                                            @else
                                                                <input type="text" name='person_incharge' disabled value="{{ Auth::user()->owner->organisation->org_name}}" class="form-control" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(auth()->user()->owner->ownership_type == 'Company')
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Person In Charge</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name='person_incharge' disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Designation</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" name='person_incharge' disabled value="{{ auth()->user()->owner->designation??''}}" class="form-control" />
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
                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(2)" class="btn btn-primary float-right">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-location-tab" id="step2">
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
                                                        @foreach ($districts as $district)
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
                                            <div class="card-footer">
                                                <button type="button"   onclick="changeTab(1)"  class="btn btn-primary">Previous</button>
                                                <button type="button"  onclick="changeTab(3)"  class="btn btn-primary float-right">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-near-tab" id="step3">
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
                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(2)"  class="btn btn-primary">Previous</button>
                                                <button type="button"   onclick="changeTab(4)"  class="btn btn-primary float-right">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step4">
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px;">#</th>
                                                            <th style="width: 40%;">Type of Services</th>
                                                            <th style="width: 40%;">Yes</th>
                                                            <th>No</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($services as $service)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{$service->name_of_services}}</td>
                                                            <td>
                                                                <input type="hidden" id="service-offered-have-add-requirement-{{ $service->id }}" value="{{ $service->have_additional_requirement}}">
                                                                <input type="hidden" id="service-ids" name="service-ids[]" value="{{ $service->id}}">
                                                                @if($service->is_specified)
                                                                    <input type="radio" value="YES" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showSpecify({{$service->id}})">
                                                                    <div id="service-specify-div-{{ $service->id }}" style="display: none;">
                                                                        <label for="service-specify-{{ $service->id }}">Specify service (separate by comma service if are many)</label>
                                                                        <input type="text" id="service-specify-{{ $service->id }}" class="form-control form-control-sm">
                                                                    </div>
                                                                @else
                                                                    @if ($service->have_additional_requirement)
                                                                        <input type="radio" value="YES" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showAdditionalRequirement({{$service->id}})">

                                                                        <div id="service-offered-add-requirement-div-{{ $service->id }}" style="display: none">
                                                                            <label for="service-offered-add-requirement-{{ $service->id }}"> {{$service->additional_requirement}}</label>
                                                                            <input class="form-control input-sm form-control-sm" type="text" id="service-offered-add-requirement-{{ $service->id }}" placeholder="Enter {{$service->additional_requirement}} here...">
                                                                        </div>
                                                                    @else
                                                                        <input type="radio" value="YES" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}">
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(str_contains(strtolower($service->name_of_services),'specify'))
                                                                    <input type="radio" value="NO" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showSpecify({{$service->id}})" checked>
                                                                @else
                                                                    @if ($service->have_additional_requirement)
                                                                        <input type="radio" value="NO" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showAdditionalRequirement({{$service->id}})" checked>
                                                                    @else
                                                                        <input type="radio" value="NO" id="service-offered-{{ $service->id }}" name="service-offered-{{ $service->id }}" checked>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(3)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(5)">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="staffing" id="step5">
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2">
                                                            #
                                                        </th>
                                                        <th rowspan="2">
                                                            Staffing
                                                        </th>
                                                        <th colspan="2" style="text-align: center;">
                                                            Number of Employed
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Full time</th>
                                                        <th>Part time</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($occupations as $occupation)
                                                        <tr>
                                                            <input type="hidden" name="occupation-ids[]" value="{{ $occupation->id }}"/>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                {{ $occupation->name }}
                                                                @if($occupation->is_specified)
                                                                    <input type="text" id="occupation-specified" class="form-control-sm form-control" placeholder="Please specify here....">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="number" value="0" id="staffing-full-time-{{$occupation->id}}" class="form-control form-control-sm">
                                                            </td>
                                                            <td>
                                                                <input type="number" value="0" id="staffing-part-time-{{$occupation->id}}" class="form-control form-control-sm">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(4)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(6)">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step6">
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Types of premises</th>
                                                        <th>Number of rooms</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($premiseTypes as $premiseType)
                                                        <tr>
                                                            <input type="hidden" name="premise-ids[]" value="{{$premiseType->id}}"/>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$premiseType->name}}</td>
                                                            <td>
                                                                <input type="number" id="premise-number-of-room-{{ $premiseType->id }}" value="0" class="form-control form-control-sm">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(5)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(7)">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step7">
                                            <div class="card-body">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type of ward</th>
                                                        <th>Number of Beds</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($typeOfWards as $typeOfWard)
                                                    <tr>
                                                        <input type="hidden" value="{{$typeOfWard->id}}" name="type-of-ward-ids[]"/>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            {{$typeOfWard->name}}
                                                            @if($typeOfWard->is_specified)
                                                                <input type="text" id="type-of-ward-specified" class="form-control-sm form-control" placeholder="Please enter type of ward here...">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="number" value="0" id="number-of-bed-by-type-of-ward-{{$typeOfWard->id}}" class="form-control form-control-sm">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(6)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(8)">Next</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step8">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">1). Building (Wall intact/have cracks)</label>
                                                        <ul>
                                                            @foreach($buildingParts as $buildingPart)
                                                                <li><label>{{$buildingPart->name}}</label>
                                                                    <div class="form-group">
                                                                        @foreach($buildingPart->state as $state)
                                                                            <div class="custom-control custom-radio">
                                                                                <input class="custom-control-input" type="radio" value="{{ $state->name }}" id="building-part-state-{{$state->id}}" name="building-part-state-{{$buildingPart->id}}">
                                                                                <label for="building-part-state-{{$state->id}}" class="custom-control-label">{{ $state->name }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <br/>
                                                        <label for="">3). Sanitation:</label>
                                                        <ul>
                                                            <li><label>Type of toilet</label>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="None" id="toilet-sanitation-type-of-toilet-none" name="toilet-sanitation-type-of-toilet">
                                                                        <label for="toilet-sanitation-type-of-toilet-none" class="custom-control-label">None</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Flush" id="toilet-sanitation-type-of-toilet-flush" name="toilet-sanitation-type-of-toilet">
                                                                        <label for="toilet-sanitation-type-of-toilet-flush" class="custom-control-label">Flush</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Pit latrine" id="toilet-sanitation-type-of-toilet-pit-latrine" name="toilet-sanitation-type-of-toilet">
                                                                        <label for="toilet-sanitation-type-of-toilet-pit-latrine" class="custom-control-label">Pit latrine</label>
                                                                    </div>
                                                                </div>

                                                            </li>
                                                            <li><label>Type for Gender</label>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Male" id="toilet-sanitation-type-for-gender-male" name="toilet-sanitation-type-for-gender">
                                                                        <label for="toilet-sanitation-type-for-gender-male" class="custom-control-label">Male</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Female" id="toilet-sanitation-type-for-gender-female" name="toilet-sanitation-type-for-gender">
                                                                        <label for="toilet-sanitation-type-for-gender-female" class="custom-control-label">Female</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Both" id="toilet-sanitation-type-for-gender-both" name="toilet-sanitation-type-for-gender">
                                                                        <label for="toilet-sanitation-type-for-gender-both" class="custom-control-label">Both</label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><label>State of Toilet</label>
                                                                <div class="form-group">
                                                                    @foreach($stateOfToilets as $stateOfToilet)
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio" value="{{ $stateOfToilet }}" id="toilet-sanitation-state-of-toilet-{{ str_replace(' ','-',strtolower($stateOfToilet)) }}" name="toilet-sanitation-state-of-toilet">
                                                                            <label for="toilet-sanitation-state-of-toilet-{{ str_replace(' ','-',strtolower($stateOfToilet)) }}" class="custom-control-label">{{ $stateOfToilet }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                            <li><label>Sewerage system</label>
                                                                <div class="form-group">
                                                                    @foreach($sewerageSystems as $sewerageSystem)
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio" value="{{ $sewerageSystem }}" id="toilet-sanitation-sewerage-system-{{ str_replace(' ','-',strtolower($sewerageSystem)) }}" name="toilet-sanitation-sewerage-system">
                                                                            <label for="toilet-sanitation-sewerage-system-{{ str_replace(' ','-',strtolower($sewerageSystem)) }}" class="custom-control-label">{{ $sewerageSystem }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">2). Water Supply</label>
                                                        <ul>
                                                            <li><label>Source of water</label>
                                                                <div class="form-group">
                                                                    @foreach($waterSupplies as $waterSupply)
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input class="custom-control-input" type="checkbox" value="{{ $waterSupply->name }}" id="source-of-water-{{$waterSupply->id}}" name="source-of-water-opt">
                                                                            <label for="source-of-water-{{$waterSupply->id}}" class="custom-control-label">{{ $waterSupply->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                            <li><label>Is water adequate for all purposes?</label>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Yes" id="is-water-adequate-yes" name="is-water-adequate">
                                                                        <label for="is-water-adequate-yes" class="custom-control-label">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="No" id="is-water-adequate-no" name="is-water-adequate">
                                                                        <label for="is-water-adequate-no" class="custom-control-label">No</label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><label>Water available for drink?</label>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="None" id="water-for-drink-none" name="water-for-drink">
                                                                        <label for="water-for-drink-none" class="custom-control-label">None</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Not boiled" id="water-for-drink-not-boiled" name="water-for-drink">
                                                                        <label for="water-for-drink-not-boiled" class="custom-control-label">Not boiled</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" type="radio" value="Yes" id="water-for-drink-yes" name="water-for-drink">
                                                                        <label for="water-for-drink-yes" class="custom-control-label">Yes (and boiled)</label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul><br/>
                                                        <label for="">4). Waste Disposal</label>
                                                        <ul>
                                                            @foreach($wasteDisposals as $wasteDisposal)
                                                                <li><label>{{$wasteDisposal['name']}}</label>
                                                                    <div class="form-group">
                                                                        @foreach($wasteDisposal['list'] as $list)
                                                                            <div class="custom-control custom-radio">
                                                                                <input class="custom-control-input" type="radio" value="{{ $list }}" id="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}-{{str_replace('/','-',strtolower(str_replace(' ','-',$list)))}}" name="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}">
                                                                                <label for="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}-{{str_replace('/','-',strtolower(str_replace(' ','-',$list)))}}" class="custom-control-label">{{ $list }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(7)" class="btn btn-primary">Previous</button>
                                                <button type="submit" class="btn btn-primary float-right" onclick="submitForm()">Submit</button>
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

         function changeTab(btnNumber) {
             let tabBtn = $("#tab-btn-"+btnNumber)
             tabBtn.click()
         }

         function submitForm() {

         }
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

        function showAdditionalRequirement(id) {
            let yesInput = $('input[name="service-offered-'+id+'"]:checked');
            // let ids = $('input[name="service-ids[]"]');  // this is for get all ids
            let additionalDiv = $('#service-offered-add-requirement-div-'+id);


            if (yesInput.val() === "YES")
                additionalDiv.show();
            else
                additionalDiv.hide()
        }

        function showSpecify(id) {
            let yesInput = $('input[name="service-offered-'+id+'"]:checked');
            let specifyDiv = $('#service-specify-div-'+id)
            if (yesInput.val() === "YES")
                specifyDiv.show();
            else
                specifyDiv.hide()
        }
        </script>


@endsection
