@extends('layouts.registrar_app')
@section('title', 'Decision | Make')
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
              <li class="breadcrumb-item active">Comments</li>
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
                        <div class="card-header">
                          <h3 class="card-title">User Registration Form</h3>
                        </div>
                         
                        <form method="POST" action="/registrar/store_decisions">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Registration</label>
                                          <select class="form-control select2" name=registration_id style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                           
                                          </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Review Status</label>
                                          <select class="form-control select2" name=review_status style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                           
                                          </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                 
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Stating date of operation</label>
                                        <input type="date" class="form-control" name="starting_date_of_operation" :value="old('starting_date_of_operation')"/>
                                    </div>
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Ending date of operation</label>
                                        <input type="date" class="form-control" name="ending_date_of_operation" :value="old('ending_date_of_operation')"/>
                                    </div>
                                    </div>
                                    
                                  </div>

                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Review Type</label>
                                          <select class="form-control select2" name=review_type style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                           
                                          </select>
                                        </div>
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
    
@endsection
