@extends('layouts.user_app')
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
                         
                        <form method="POST" action="/user/general_facility_info_form">
                            @csrf
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
                                                    <input type="text" class="form-control" name="type_of_health_unit_specified" />
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
                                                    <input type="text" class="form-control" name="authority_responsible_specified" />
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
                                            <label class="col-sm-4 col-form-label">Ownership Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" onchange="ownership(this);" name="ownership_type" style="width: 100%;">
                                                    <option value="#">--Select--</option>
                                                   <option value="Sole Proprietorship">Sole Proprietorship(Individual)</option>
                                                   <option value="Partnership">Partnership</option>
                                                   <option value="Company">Company</option>   
                                               </select>
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
        </script>
        
@endsection
