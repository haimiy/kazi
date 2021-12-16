@extends('layouts.registrar_app')
@section('title', 'All | Change User Password')
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
                            <li class="breadcrumb-item active">change User password</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <h3 class="card-title">
                            
                                <h3 class="card-title">Change User Password</h3>
                              
                            </h3>
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form class="form-horizontal" method="POST" action="/registrar/store_change_user_password">
                                @csrf
                                <div class="card-body">
                                      <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="phone_no">
                                        </div>
                                      </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Change Password</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
   
@endsection

