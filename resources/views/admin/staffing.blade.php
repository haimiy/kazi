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
                    <strong><li class="active"><a href="hospital">Staffing</a></li></strong>
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
                            <a href="/staffing_create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add Staff</button></a>
                            </div>
                            <!-- <div class="col-md-10 text-right">
                                <form action="/general_list/import" method="POST" enctype="multipart/form-data" id="importForm">
                                @csrf
                                    <input type="file" name="file" id="myFile" style="display: none;">
                                    <input type="file" name="file" id="browse" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp; import</button>
                                    <input type=submit class="btn btn-warning">submit</input>
                                    <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-download"></i>&nbsp; export</button></a>
                                </form>
                            </div> -->
                        </div>   
                    </div>
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
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Lincense Job</th>
                                    <th>Telephone no</th>
                                    <th>Address</th>
                                    <th>Status Categories</th>
                                    <th>Staffing no</th>
                                    <th>Permanent/Temporary</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->first_name . ' '. $user->middle_name . ' ' . $user->last_name}} </td>
                                        <td>{{ $user->license_job}}</td>
                                        <td>{{ $user->phone_no }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->status_categories }}</td>
                                        <td>{{ $user->staffing_no }}</td>
                                        <td>{{ $user->temporary_permanent }}</td>
                                         <td>
                                            <a href="#" data-toggle="modal" data-target="#largeModal"><i class="fa fa-pencil text-primary"></i></a>
                                            <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                            <a href="#"><i class="fa fa-eye text-secondary"></i></a>
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
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Staffing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/staffingUpdate/{{ $user->id }}" method="POST">
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
                                    <div class="form-group">
                                        <label class=" form-control-label">License Job.</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                            <input type="text" name="license_job" value="{{ $user->license_job}}" class="form-control">
                                        </div>
                                        <small class="form-text text-muted">ex. 12ab</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Status Categories</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input type="text" name="status_categories" value="{{ $user->status_categories}}" class="form-control">
                                        </div>
                                        <small class="form-text text-muted">ex. active</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Staffing no</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input type="number" name="staffing_no" value="{{ $user->staffing_no}}" class="form-control">
                                        </div>
                                        <small class="form-text text-muted">ex.erw214 </small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Permanent/Temporary</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <select name="temporary_permanent" value="{{ $user->temporary_permanent}}" class="form-control">
                                                <option value="">--Select---</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Permanent">Permanent</option>    
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">ex.owner</small>
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
            </div>
           
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
// </script>



@endsection