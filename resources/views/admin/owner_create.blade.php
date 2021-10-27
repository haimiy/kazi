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
                    <li class="active"><a href="#">Owner Forms</a></li>
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
    <form action="/owner_create_store" method="POST">
        <div class="row">
            @csrf
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                                <label class=" form-control-label">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="first_name"  class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. safiya</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Second Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" name="middle_name" class="form-control">
                                </div>
                                    <small class="form-text text-muted">ex.Suleiman</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex.Iddi</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <small class="form-text text-muted">ex.Safia@gmail.com</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-body card-block">
                        {{-- <div class="form-group">
                            <label class=" form-control-label">Role Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <select name="role_id" class="form-control">
                                    <option value="">--Select---</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="form-text text-muted">ex.owner</small>
                        </div> --}}
                        <div class="form-group">
                                <label class=" form-control-label">Telephone number</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" name="phone_no" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex.0693858355</small>
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <small class="form-text text-muted">ex. namirah ramadhan p.o.box 2345</small>
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