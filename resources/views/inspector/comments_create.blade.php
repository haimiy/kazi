@extends('layouts.inspector_app')
@section('title', 'Comments | Inspector')
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
                          <h3 class="card-title">Comment by Inspector</h3>
                        </div>
                         
                        <form method="POST" action="/inspector/store_comments">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Health Facility Name</label>
                                          <select class="form-control select2" name=health_facility_inspection_id style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                           
                                          </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Inspection guidelines questions</label>
                                          <select class="form-control select2" name=inspector_guidelines_question_id style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                           
                                          </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Inspection guidelines Name</label>
                                        <input type="text" class="form-control" name="name" :value="old('name')" />
                                    </div>
                                    </div>
                                    
                                  </div>
                                 
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Comments</label>
                                        <input type="text" class="form-control" name="comments" :value="old('comments')"/>
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
