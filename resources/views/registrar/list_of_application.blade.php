@extends('layouts.registrar_app')
@section('title', 'Application list')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<style>
    a:hover, a:active, a:focus {
    text-decoration: none;
    color: #777;
    outline: none;
}
.action-icon {
    color: #777;
    font-size: 18px;
    padding: 0 10px;
    display: inline-block;
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
              <li class="breadcrumb-item active">Application List</li>
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
                          <h3 class="card-title">List of all Applications</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Owner Name</th>
                              <th>Health Facility Name</th>
                              <th>Status</th>
                              <th>View Details</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach ($list_of_applications as $list_of_application)
                           <tr>
                            <td>{{ $loop->iteration}}</td>
                             <td>{{ $list_of_application->first_name. ' '.$list_of_application->middle_name. ' '.$list_of_application->last_name }}</td>
                             <td>{{ $list_of_application->facility_name }}</td>
                             <td>
                                    @if ($list_of_application->status == "Inspected")
                                    <span class="badge bg-primary">{{ $list_of_application->status }}</span>
                                    @elseif ($list_of_application->status == "Accepted")
                                    <span class="badge bg-success">{{ $list_of_application->status }}</span>
                                    @elseif ($list_of_application->status == "Rejected")
                                    <span class="badge bg-danger">{{ $list_of_application->status }}</span>
                                    @endif
                              </td>
                              <td>
                                <a href="/registrar/detailed_list_of_application/{{ $list_of_application->id}}" class="action-icon"><i class="fa fa-eye m-r-5"></i>

                              </td>
                           </tr>
                           @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Owner Name</th>
                              <th>Health Facility Name</th>
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
  </script>
@endsection
