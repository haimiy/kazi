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
                 <h3><button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">
                    <i class="fas fa-edit"></i>&nbsp; Add Decision</button></h3>
                    <!-- <h3 class="text-center">{{ $detailed_list->facility_name}}</h3>
                    <h4 class="text-center">{{ $detailed_list->first_name . ' '. $detailed_list->middle_name . ' ' . $detailed_list->last_name}}</h4> -->
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body clearfix">
              <strong>* Type of Health Unit:</strong>    {{ $detailed_list->tohuName}}<br>
                            
              <strong>* Authority responsible for establishing/ running the facility:</strong>   {{ $detailed_list->authName}}<br>
                              
                               
              <strong>* What date did you expect to start operation:</strong>    {{ $detailed_list->starting_operation_date}}<br>
                              
                               
              <strong>* Name of Doctor In-charge:</strong>    {{ $detailed_list->full_name}}<br>
                              
                               
              <strong>* Qualification of the Doctor in charge:</strong>    {{ $detailed_list->qualification}}<br>
                              
                               
              <strong>* Registration number (if facility previously registered):</strong>   {{ $detailed_list->reg_no}}<br>
                              
                              
              <strong>* Address:</strong>
                                {{ $detailed_list->address}}<br>
                              
                              
              <strong>* Street:</strong>
                                {{ $detailed_list->street}}<br>
                              
                              
              <strong>* Village:</strong>
                                {{ $detailed_list->village}}<br>
                              
                              
              <strong>  * Ward:</strong>
                                {{ $detailed_list->ward}}<br>
                              
                              
              <strong> * P.O. BOX:</strong>
                                {{ $detailed_list->po_box}}<br>
                              
                              
              <strong>* Telephone No.:</strong>
                                {{ $detailed_list->phone_no}}<br>
                              
                              
              <strong>* District:</strong>
                                {{ $detailed_list->districtName}}<br>
                              
                              
              <strong>* Region:</strong>
                                {{ $detailed_list->region}}<br>
                              
                              
              <strong>* E - mail:</strong>
                                {{ $detailed_list->email}}<br>
                              
                              
              <strong> * Nearest Health Faciliy Name:</strong>
                                {{ $detailed_list->nearest_hospital_name}}<br>
                              
                              
              <strong>* Nearest Health Faciliy Owner:</strong>
                                {{ $detailed_list->nearest_hospital_owner}}<br>
                              
                              
              <strong>* Nearest Health Faciliy distance:</strong>
                                {{ $detailed_list->nearest_hospital_distance}}<br>
                              
                              
              <strong>* Nearest Health Faciliy Type of Health Unit:</strong>
                                {{ $detailed_list->nearest_hospital_type_of_health_unit}}<br>
                              
                              
              <strong>* Services Offered:</strong>
                                {{ $detailed_list->name_of_services}}<br>
                                    
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
        <form method="POST" action="/registrar/store_decisions">
         @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registrar Decision</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Registration Id</label>
                    <input class="form-control" name="registration_id" style="width: 100%;">  
                    </input>
                  </div>
                </div>    
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Review Status</label>
                        <select class="form-control select2" name="review_status" style="width: 100%;">
                          <option selected="selected">--Select--</option>     
                          <option value="approved">Approved</option>        
                          <option value="rejected">Rejected</option>        
                        </select>
                      </div>
                  </div> 
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Starting date of operation</label>
                    <input type="date" class="form-control" name="starting_date_of_operation" :value="old('starting_date_of_operation')" />
                </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Ending date of operation</label>
                    <input type="date" class="form-control" name="ending_date_of_operation" :value="old('ending_date_of_operation')" />
                </div>
                </div>  
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Registrar Id</label>
                    <textarea type="text" class="form-control" name="registrar_id" :value="old('registrar_id')"></textarea>
                </div>
                </div>  
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Review Type</label>
                        <select class="form-control select2" name="review_type" style="width: 100%;">
                          <option selected="selected">--Select--</option>     
                          <option value="fixed Review">Fixed Review</option>        
                          <option value="Appeal Review">Appeal Review</option>        
                        </select>
                      </div>
                  </div> 
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
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