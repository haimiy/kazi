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
                    <li class="active"><a href="#">General List Forms</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
    <form action="/byDistrict/create" method="POST">
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
                                <label class=" form-control-label">District categories</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" name="district_categories" class="form-control">
                                </div>
                                    <small class="form-text text-muted">ex. urban district</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Owner id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="number" name="owner_id" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. omar saleh omar</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Registration no.</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                    <input type="text" name="reg_no" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. 12ab</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Year</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input type="date" name="year" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. 04/02/1991</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                                <label class=" form-control-label">Staffing id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                    <input type="number" name="staffing_id" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. khairat makame</small>
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
                                <label class=" form-control-label">Doctor incharge id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="number" name="doctor_incharge_id" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. safiya suleiman iddi</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Inspection date</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="date" name="inspection_date" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex.31/12/2020</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Lincense reg date</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="date" name="license_reg_date" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. 1/1/2022</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4">
                <!-- <div class="card">
                    <div class="card-body">
                        <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                            <option value=""></option>
                            <option value="United States">Unguja</option>
                            <option value="United Kingdom">Pemba</option>
                        </select>
                    </div>
                </div> -->
                        <div class="form-group">
                                <label class=" form-control-label">Service delivary</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="service_delivery" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. dispensary</small>
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