@extends('layouts.registrar_app')
@section('title', 'All | by District')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        a:hover, a:active, a:focus {
            text-decoration: none;
            color: #009ce7;
            outline: none;
        }
        .action-icon {
            color: #777;
            font-size: 18px;
            padding: 0 10px;
            display: inline-block;
        }
        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
        .dropdown-item:first-child {
            border-top-left-radius: calc(0.25rem - 1px
            );
            border-top-right-radius: calc(0.25rem - 1px
            );
        }
    </style>
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
                            <li class="breadcrumb-item active">by District</li>
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
                                <h3 class="card-title">
                                    <h5 class="text-center">LIST OF PRIVATE HOSPITAL IN 2021/22 BY DISTRICT</h5>
                                </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hospital Name</th>
                                        <th>Owner</th>
                                        <th>Registration no.</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                        <th>View Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($private_hospitals as $private_hospital)
                                    <tr>
                                      <td>{{ $loop->iteration}}</td>
                                      <td>{{ $private_hospital->facility_name}}</td>
                                      <td>{{ $private_hospital->first_name.' '.$private_hospital->middle_name.' '.$private_hospital->last_name}}</td>
                                      <td>{{ $private_hospital->reg_no}}</td>
                                      <td>{{ $private_hospital->starting_date}}</td>                   <td>
                                         @if( $private_hospital->status == 'Opened')
                                        <span class="badge bg-success">{{ $private_hospital->status }}</span>
                                        @elseif( $private_hospital->status == 'Closed')  
                                        <span class="badge bg-danger">{{ $private_hospital->status }}</span>
                                        @else
                                        <span class="badge bg-secondary">{{ $private_hospital->status }}</span>
                                        @endif
                                      </td>

                                      <td><a href="/registrar/detailed_list_of_health_facility/{{ $private_hospital->id}}"><i class="fa fa-eye text-secondary m-r-5"></i></a></td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Hospital Name</th>
                                        <th>Owner</th>
                                        <th>Registration no.</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                        <th>View Details</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        function deleteUser(id){
            var formId = 'delete-'+id
            document.getElementById(formId).submit()
        }

        $(document).ready(function() {
            $('#browse').click(function () {
                $('#myFile').click();
            });

            $('#myFile').change(function (e) {
                $("#importForm").submit();
            });
        });
    </script>
@endsection

