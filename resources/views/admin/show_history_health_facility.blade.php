@extends('layouts.app')
@section('title', '')
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
.text-center {
    text-align: center;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
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
              <li class="breadcrumb-item active">Hospital List</li>
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
                            <h3 class="card-title">
                              <form action="/admin/hospital_statistics/import" method="POST" enctype="multipart/form-data" id="importForm">
                                  @csrf
                                      <input type="file" id="myFile" name='file' style="display: none;">
                                      <button type="button" id="browse" class="btn btn-primary">
                                          <i class="fa fa-upload" onclick=""></i>&nbsp; Import</button>
                              </form>
                              <h3 class="text-center">LIST OF PRIVATE HOSPITAL IN 2020/21,<br> IN GENERAL</h3>
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
                            </h3>
                      </div> 
                        </h3>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>facility Name</th>
                              <th>Registration No</th>
                              <th>District Name</th>
                              <th>Type of Health Unit</th>
                              <th>Year</th>
                              <th>Owner</th>
                              <th>Phone no.</th>
                              <th>Location</th>
                              <th>Service Delivary</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($health_facility as $health_facility)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $health_facility->facility_name }}</td>
                                <td>{{ $health_facility->reg_no }}</td>
                                <td>{{ $health_facility->district_name }}</td>
                                <td>{{ $health_facility->type_of_health_unit }}</td>
                                <td>{{ $health_facility->starting_operation_date }}</td>
                                <td>{{ $health_facility->full_name }}</td>
                                <td>{{ $health_facility->phone_no }}</td>
                                <td>{{ $health_facility->location }}</td>
                                <td>{{ $health_facility->service_name }}</td>
                                
                              </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Facility Name</th>
                                <th>Registration No</th>
                                <th>District Name</th>
                                <th>Type of Health Unit</th>
                                <th>Year</th>
                                <th>Owner</th>
                                <th>Phone no.</th>
                                <th>Location</th>
                                <th>Service Delivary</th>
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
       function deleteHospital(id){
        var formId = 'delete-'+id
        document.getElementById(formId).submit()
    }
  </script>
   <script>
    $(document).ready(function(){
      $('#browse').click(function(){
      $('#myFile').click();
      });

      $('#myFile').change(function(e) {
          $("#importForm").submit();
      });
      
});
</script>
@endsection
