@extends('layouts.registrar_app')
@section('title', 'detailed health facility')
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
              <li class="breadcrumb-item active">Health Facility details</li>
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
                       <div class="card-header text-center">
                        <div class="text-center">
                           <h3> {{ $hospital->facility_name}}</h3>
                        </div>
                    </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary" style="margin-bottom: 20px;">
                                    <i class="fa fa-map-marker" onclick=""></i>&nbsp; Update Location</a>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Health Facility Name:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->facility_name}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Registration number:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->reg_no}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Owner Name:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->first_name.' '.$hospital->middle_name.' '.$hospital->last_name}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Type of Health Unit:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->type_of_health_unit_specified}}</dd>
                              <dd>{{ $hospital->typeOfHealthUnit}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Services Delivary:</dt>
                            </div>
                            <div class="col-sm-8">
                              @foreach($services as $service)
                              <dd>
                                @if($service->name_of_services != 'Other (Specify).')
                                  {{ $service->name_of_services }}
                                @endif
                                @if($service->have_additional_requirement)
                                <strong>has</strong>
                                  {{ $service->additional_requirement }}
                                @endif
                                @if($service->have_additional_requirement)
                                <strong> = </strong>
                                  {{ $service->additional_requirement_answer }}
                                @endif
                              </dd>
                              <dd>
                                @if($service->name_of_services == 'Other (Specify).')
                                  {{ $service->specified_services }}
                                @endif
                              </dd>
                              @endforeach
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Location:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->street}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Latitude:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->latitude}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Longitude:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->longitude}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Telephone:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->phone_no}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>License No.:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->license_no}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Starting Date:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->starting_date}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Ending Date:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->ending_date}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Staffing/ No. of full time:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->no_of_full_time}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Staffing/ No. of part time:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->no_of_part_time}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Doctor Incharge Name:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->full_name}}</dd>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <dt>Qualification:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->qualification}}</dd>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm-4">
                              <dt>District Name:</dt>
                            </div>
                            <div class="col-sm-8">
                              <dd>{{ $hospital->name}}</dd>
                            </div>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
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
              <form class="form-horizontal" method="POST" action="/registrar/update_location/{{ $hospital->location_id}}">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Latitude</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="latitude">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="longitude">
                    </div>
                  </div>
                  
                </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
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
@endsection
