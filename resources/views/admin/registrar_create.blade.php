@extends('layouts.app')
@section('title', 'Registrar | Create')
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Registrar</li>
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
                          <h3 class="card-title">Registarar Create</h3>
                        </div>
                         
                        <form method="POST" action="/admin/store_registrar">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <!-- text input -->
                                      <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" :value="old('first_name')" placeholder="First Name" />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" :value="old('middle_name')" placeholder="Second Name" />
                                    </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" :value="old('last_name')" placeholder="Last Name" />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')">                                    </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Phone no.</label>
                                        <input type="text" class="form-control" name="phone_no" :value="old('phone_no')" placeholder="Phone No." />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" :value="old('title')" placeholder="Title" />
                                    </div>
                                    </div>
                                  </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" :value="old('address')" placeholder="Address" />
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
