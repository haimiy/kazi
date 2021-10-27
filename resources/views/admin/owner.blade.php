@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<style>
    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    border: 1px solid #f1f2f7;
    /* background-color: #212121; */
    border: 1px solid #dddddd;
    border-color: #6c757d;
    /* border-color: transparent; */
    background-color: #009efb;
    border-radius: 0px;
}th {
    text-align: inherit;
    /* color: #777 !important; */
    color: #fff;
    font-size: 14px;
    font-weight: 700px;
    font-family: 'Open Sans';
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dddddd;;
}
</style>
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <strong><li class="active"><a href="hospital">Owner</a></li></strong>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="row">
                            <div class="col-md-2">
                            <a href="/owner_create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add owner</button></a>
                            </div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-12">
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
                                @if(Session::has('delete_message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('delete_message') }}
                                </div>
                                @endif
                            </div>  
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Telephone no.</th>
                                    <th>Address</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->first_name . ' '. $user->middle_name . ' ' . $user->last_name}} </td>
                                        <td>{{ $user->phone_no }}</td>
                                        <td>{{ $user->address }}</td>
                                         <td>
                                            <a href="#" data-toggle="modal" data-target="#largeModal"><i class="fa fa-pencil text-primary"></i></a> 

                                            <form method="POST" id="delete-{{$user->id}}" style="display: inline" action="/delete/{{ $user->id }}">
                                                @method('DELETE')
                                                @csrf
                                               <i onclick="deleteOwner( {{$user->id}} )" class="fa fa-trash text-danger"></i>
                                            </form>
                                            
                                               <a href="/owner_details/{{ $user->id }}"><i class="fa fa-eye text-secondary"></i></a>
                                        </td>   
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Owner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/owner_update/{{ $user->id }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-xs-6 col-sm-6">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                            <label class=" form-control-label">First Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="first_name" value="{{ $user->first_name}}" class="form-control">
                                            </div>
                                            <small class="form-text text-muted">ex. safiya</small>
                                    </div>
                                    <div class="form-group">
                                            <label class=" form-control-label">Second Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                <input type="text" name="middle_name" value="{{ $user->middle_name}}" class="form-control">
                                            </div>
                                                <small class="form-text text-muted">ex.Suleiman</small>
                                    </div>
                                    <div class="form-group">
                                            <label class=" form-control-label">Last Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                                <input type="text" name="last_name" value="{{ $user->last_name}}" class="form-control">
                                            </div>
                                            <small class="form-text text-muted">ex.Iddi</small>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label class=" form-control-label">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input type="email" name="email" value="{{ $user->email}}" class="form-control">
                                        </div>
                                        <small class="form-text text-muted">ex.Safia@gmail.com</small>
                                    </div>
                                    <div class="form-group">
                                            <label class=" form-control-label">Telephone number</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                                <input type="text" name="phone_no" value="{{ $user->phone_no}}" class="form-control">
                                            </div>
                                            <small class="form-text text-muted">ex.0693858355</small>
                                    </div>
                                    <div class="form-group">
                                            <label class=" form-control-label">Address</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <input type="text" name="address" value="{{ $user->address}}" class="form-control">
                                            </div>
                                            <small class="form-text text-muted">ex. namirah ramadhan p.o.box 2345</small>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            <!-- </div> -->
           
        </div>
    </div>
</div>
@endsection
@section('js')

<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
<script>
    // $(document).ready(function(){
    //     $('#browse').click(function(){
    //         $('#myFile').click();
    //     });
    //     $('myfile').change(function(e){
    //         $('#importForm').submit();
    //     });
    // });

    function deleteOwner(id){
        var formId = 'delete-'+id
        document.getElementById(formId).submit()
    }

</script>

@endsection