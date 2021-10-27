@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/chosen/chosen.min.css')}}"> 
@endsection
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="/admin/index">Dashboard</a></li>
                    <li class="active"><a href="#">Add Hospital</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
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
    <form action="{{ route('hospital.store') }}" method="POST">
        <div class="row">    
            @csrf
            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                                <label class=" form-control-label">Hospital Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="name"  class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. ZMG Hospital</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Categoies</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="health_centre_categories_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($health_centre_categories as $health_centre_categories)
                                        <option value="{{ $health_centre_categories->id }}">{{ $health_centre_categories->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.clinic</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">District</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="district_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($district as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.North</small>
                        </div>
                        
                        <div class="form-group">
                            <label class=" form-control-label">Owner</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="owner_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($owner as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->first_name . ' '. $owner->middle_name . ' ' . $owner->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.North</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Registration no.</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                    <input type="text" name="reg_no" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. 12ab</small>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Year</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <input type="date" name="year" class="form-control">
                            </div>
                            <small class="form-text text-muted">ex. 04/02/1991</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Staffing</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="staffing_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($staffing as $staffing)
                                        <option value="{{ $staffing->id }}">{{ $staffing->first_name . ' '. $staffing->middle_name . ' ' . $staffing->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.North</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">License No</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="licence_no" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. 34rg</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Doctor Incharge</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="doctor_incharge_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($doctor_incharge as $doctor_incharge)
                                        <option value="{{ $doctor_incharge->id }}">{{ $doctor_incharge->first_name . ' '. $doctor_incharge->middle_name . ' ' . $staffing->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.North</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Inspection date</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="date" name="inspection_date" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex.31/12/2020</small>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Lincense reg date</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <input type="date" name="license_reg_date" class="form-control">
                            </div>
                            <small class="form-text text-muted">ex. 1/1/2022</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Service Delivary</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="service_delivary_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($service_delivary as $service_delivary)
                                        <option value="{{ $service_delivary->id }}">{{ $service_delivary->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.North</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Location</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="location" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. fuoni mambosasa</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Phone no</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="phone_no" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex.0693858355</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Status</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="status" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. active</small>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <div class="card-footer pull-right">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
    </div><!-- .animated -->
</div>

@endsection
@section('js')
<script src="{{ asset('assets/vendors/chosen/chosen.jquery.min.js')}}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

@endsection