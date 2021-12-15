@extends('layouts.registrar_app')
@section('title', 'All | by Level')
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
                            <li class="breadcrumb-item active">by Level</li>
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
                                    <h5 class="text-center">LIST OF PRIVATE HOSPITAL IN 2021/22 BY LEVEL</h5>
                                </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Level of Services Delivary</th>
                                        <th>Hospital Name</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($private_hospitals as $private_hospital)
                                        @php
                                            $facility_names = explode(",",$private_hospital->facility_name)
                                        @endphp
                                    <tr>
                                      <td>{{ $loop->iteration}}</td>
                                       <td>{{ $private_hospital->typeOfHealthUnit}}</td>
                                      <td>
                                          <ol>
                                              @foreach($facility_names as $facility_name)
                                              <li>{{ $facility_name}}</li>
                                              @endforeach
                                          </ol>
                                      </td>                  
                                        
                                    </tr>
                                @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>District Name</th>
                                        <th>Level of Services Delivary</th>
                                        
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>typeOfHealthUnit
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

