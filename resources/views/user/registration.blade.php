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
              <li class="breadcrumb-item active">User Registration Form</li>
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
                          <h3 class="card-title">User Registration Form</h3>
                        </div>
                         
                        <form method="POST" action="/user/registration_form">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Type of Health Unit</label>
                                          <select class="form-control select2" onchange="other(this);" name="type_of_health_unit_id" style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                            @foreach ($type_of_health_unit as $type_of_health_unit)
                                            <option value="{{$type_of_health_unit->id}}">{{$type_of_health_unit->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"  id="other" style="display: none;">
                                            <label>Other Type of Health Unit</label>
                                            <input type="text" class="form-control" name="type_of_health_unit_specified" />
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Authority responsible for establishing/ running the facility</label>
                                          <select class="form-control select2" onchange="authority(this);" name="authority_responsible_id" style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                            @foreach ($authority_responsible as $authority_responsible)
                                            <option value="{{$authority_responsible->id}}">{{$authority_responsible->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"  id="authority" style="display: none;">
                                            <label>Other Authority responsible</label>
                                            <input type="text" class="form-control" name="authority_responsible_specified" />
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>What date did you expect to start operation</label>
                                            <input type="date" class="form-control" name="starting_operation_date" />
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
