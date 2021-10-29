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
              <li class="breadcrumb-item active">Health Facility Location</li>
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
                          <h3 class="card-title">Health Facility Location</h3>
                        </div>
                         
                        <form method="POST" action="/user/location_form">
                            @csrf
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
