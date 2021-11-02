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
.text-center {
    text-align: center;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
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
              <li class="breadcrumb-item active">Hospital Statistics</li>
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
                          {{-- <h3 class="card-title">
                              <form action="/admin/hospital_statistics/import" method="POST" enctype="multipart/form-data" id="importForm">
                                  @csrf
                                      <input type="file" id="myFile" name='file' style="display: none;">
                                      <button type="button" id="browse" class="btn btn-primary">
                                          <i class="fa fa-upload" onclick=""></i>&nbsp; Import</button>
                              </form>
                          </h3>
                          </div> --}}
                        
                          <h3 class="text-center">HOSPITAL BINAFSI ZILIZO ANZISHWA KWA MUJIBU WA <br> NAMBA 4 YA MWAKA 1994</h3> 
                      </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
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
