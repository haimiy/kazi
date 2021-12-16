@extends('layouts.registrar_app')
@section('title', 'History of Health Facility')
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
                          <h3 class="card-title">
                            
                              <h3 class="text-center">HOSPITAL BINAFSI ZILIZO ANZISHWA KWA MUJIBU WA <br> NAMBA 4 YA MWAKA 1994</h3>
                              <h3>
                              <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary" style="margin-bottom: 20px;">
                                    <i class="fa fa-plus" onclick=""></i>&nbsp; Add Hospital</a>
                            </h3>
                          </h3>

                          </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Starting year</th>
                                    <th>Health facility
                                      <p>Total: {{$health_facility_sum}}</p>
                                    </th>
                                    <th>Hospital no.
                                      <p>Total: {{$hospital_no_sum}}</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hospital_statistics as $hospital_statistics )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hospital_statistics->starting_year }}</td>
                                       
                                        <td>
                                           @if($hospital_statistics->health_facility == 0)
                                           @else
                                           {{ $hospital_statistics->health_facility }}
                                           @endif
                                        </td>

                                        <td>
                                           @if($hospital_statistics->hospital_no == 0)
                                           @else
                                           {{ $hospital_statistics->hospital_no }}
                                           @endif
                                        </td>
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
</section>
</div>
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Latitude and Longitude</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="/registrar/add_hospital_statistics">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Starting Year</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="starting_year">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Health Facility No.</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="health_facility">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Hospital No.</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="hospital_no">
                    </div>
                  </div>
                </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
