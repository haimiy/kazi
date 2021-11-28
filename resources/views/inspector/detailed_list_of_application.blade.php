@extends('layouts.inspector_app')
@section('title', 'detailed | list')
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
              <li class="breadcrumb-item active">Comments</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
             <!-- /.row -->
         <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <h3><button type="button" id="browse" class="btn btn-primary">
                    <i class="fas fa-edit" onclick=""></i>&nbsp; Add Comments</button></h3>
                    <!-- <h3 class="text-center">{{ $detailed_list->facility_name}}</h3>
                    <h4 class="text-center">{{ $detailed_list->first_name . ' '. $detailed_list->middle_name . ' ' . $detailed_list->last_name}}</h4> -->
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body clearfix">

   <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Question</th>
                              <th>Answer</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>* Type of Health Unit</td>
                                <td>{{ $detailed_list->tohuName}}</td>
                              </tr>
                               <tr>
                                <td>* Authority responsible for establishing/ running the facility</td>
                                <td>{{ $detailed_list->authName}}</td>
                              </tr>
                               <tr>
                                <td>* What date did you expect to start operation</td>
                                <td>{{ $detailed_list->starting_operation_date}}</td>
                              </tr>
                               <tr>
                                <td>* Name of Doctor In-charge</td>
                                <td>{{ $detailed_list->full_name}}</td>
                              </tr>
                               <tr>
                                <td>* Qualification of the Doctor in charge</td>
                                <td>{{ $detailed_list->qualification}}</td>
                              </tr>
                               <tr>
                                <td>* Registration number (if facility previously registered)</td>
                                <td>{{ $detailed_list->reg_no}}</td>
                              </tr>
                              <tr>
                                <td>* Address</td>
                                <td>{{ $detailed_list->address}}</td>
                              </tr>
                              <tr>
                                <td>* Street</td>
                                <td>{{ $detailed_list->street}}</td>
                              </tr>
                              <tr>
                                <td>* Village</td>
                                <td>{{ $detailed_list->village}}</td>
                              </tr>
                              <tr>
                                <td>* Ward</td>
                                <td>{{ $detailed_list->ward}}</td>
                              </tr>
                              <tr>
                                <td>* P.O. BOX</td>
                                <td>{{ $detailed_list->po_box}}</td>
                              </tr>
                              <tr>
                                <td>* Telephone No.</td>
                                <td>{{ $detailed_list->phone_no}}</td>
                              </tr>
                              <tr>
                                <td>* District</td>
                                <td>{{ $detailed_list->districtName}}</td>
                              </tr>
                              <tr>
                                <td>* Region</td>
                                <td>{{ $detailed_list->region}}</td>
                              </tr>
                              <tr>
                                <td>* E - mail</td>
                                <td>{{ $detailed_list->email}}</td>
                              </tr>
                              <tr>
                                <td>* Nearest Health Faciliy Name</td>
                                <td>{{ $detailed_list->nearest_hospital_name}}</td>
                              </tr>
                              <tr>
                                <td>* Nearest Health Faciliy Owner</td>
                                <td>{{ $detailed_list->nearest_hospital_owner}}</td>
                              </tr>
                              <tr>
                                <td>* Nearest Health Faciliy distance</td>
                                <td>{{ $detailed_list->nearest_hospital_distance}}</td>
                              </tr>
                              <tr>
                                <td>* Nearest Health Faciliy Type of Health Unit</td>
                                <td>{{ $detailed_list->nearest_hospital_type_of_health_unit}}</td>
                              </tr>
                              <tr>
                                <td>* Services Offered</td>
                                <td>{{ $detailed_list->name_of_services}}</td>
                              </tr>
  
                            </tbody>
                            <tfoot>
                             <tr>
                              <th>Question</th>
                              <th>Answer</th>  
                            </tr>
                            </tfoot>
                          </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
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