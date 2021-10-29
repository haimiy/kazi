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
                                            <label class="col-sm-4 col-form-label">Staff</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" onchange="other(this);" name="type_of_health_unit_id" style="width: 100%;">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($staff as $staff)
                                                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-group"  id="other" style="display: none;">
                                                    <label></label>
                                                    <input type="text" class="form-control" name="type_of_health_unit_specified" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Type of Premises</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" onchange="authority(this);" name="authority_responsible_id" style="width: 100%;">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($premise as $premise)
                                                    <option value="{{$premise->id}}">{{$premise->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-group"  id="authority" style="display: none;">
                                                    <label></label>
                                                    <input type="text" class="form-control" name="authority_responsible_specified" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Type of Premises</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" onchange="authority(this);" name="authority_responsible_id" style="width: 100%;">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($by_ward as $by_ward)
                                                    <option value="{{$by_ward->id}}">{{$by_ward->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-group"  id="authority" style="display: none;">
                                                    <label></label>
                                                    <input type="text" class="form-control" name="authority_responsible_specified" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Essential equipment</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Buildings</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Water Supply</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Sanitationy</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Waste Disposal </label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="reg_no" />
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
