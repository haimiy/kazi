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
                    <li><a href="/index/admin">Dashboard</a></li>
                    <li class="active"><a href="hospital">Hospital Statistics</a></li>
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
                    <div class="card-header text-center">
                        <strong class="card-title">Hospital statistics</strong>
                        <div class="text-center">
                            HOSPITAL BINAFSI ZILIZO ANZISHWA KWA MUJIBU WA SHERIA NAMBA 4 YA MWAKA 1994
                        </div>
                        <div class="col-md-10 text-right">
                                <form action="/hospital_statistics/import" method="POST" enctype="multipart/form-data" id="importForm">
                                @csrf
                                    <input type="file" id="myFile" name='file' style="display: none;">
                                    <button type="button" id="browse" class="btn btn-primary">
                                        <i class="fa fa-upload" onclick=""></i>&nbsp; Import</button>
                                    <a href="/hospital_statistics/export"><button type="button" class="btn btn-primary">
                                        <i class="fa fa-download"></i>&nbsp; export</button></a>
                                </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Starting year</th>
                                    <th>Health facility</th>
                                    <th>Hospital no.</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hospital_statistics as $hospital_statistics )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hospital_statistics->starting_year }}</td>
                                        <td>{{ $hospital_statistics->health_facility }}</td>
                                        <td>{{ $hospital_statistics->hospital_no }}</td> 
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
@endsection
@section('js')

<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
<script>

$(document).ready(function(){
        $('#browse').click(function(){
        $('#myFile').click();
        });

        $('#myFile').change(function(e) {
            $("#importForm").submit();
        })
        
});
</script>



@endsection