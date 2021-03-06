@extends('layouts.app')
@section('title', 'Type of Health Unit')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
<!-- Theme style -->
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> 
<style>
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
            {{-- <h3>User Registration Form</h3> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Type of Health Unit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                      <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="card-header">
                          <h3 class="card-title">Type of Health Unit</h3>
                        </div>
                         
                        <form method="POST" action="/admin/type_of_health_unit_form">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                      <!-- text input -->
                                        <div class="form-group">
                                            <label>Type of Health Unit</label>
                                            <input type="text" class="form-control" name="name" :value="old('name')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>   
                    </div>
                </div>
                <div class="col-7">
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
                          <h3 class="card-title">List of all type of Health Unit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Type of Health Unit</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>                           
                           @foreach ($type_of_health_unit as $type_of_health_unit)
                           <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $type_of_health_unit->name }}</td>
                                <td class="text-center">
                                  <div class="dropdown dropdown-action">
                                      <a href="#" class="action-icon" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                          {{-- <a class="dropdown-item" href="#" data-target="#modal-lg" data-toggle="modal"><i class="fa fa-pencil-alt m-r-5"></i> Edit</a> --}}
                                          <form id="delete-{{$type_of_health_unit->id}}" method="POST" style="display: inline" class="dropdown-item" action="/admin/delete_health_unit/{{ $type_of_health_unit->id }}">
                                              @method('DELETE')
                                              @csrf
                                              <a class="dropdown-item" href="#"><i onclick="deleteHospital( {{$type_of_health_unit->id}} )" class="fa fa-trash m-r-5"></i>Delete</a>
                                          </form>
                                      </div>
                                  </div>
                              </td>
                            </tr>
                           @endforeach                            
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Type of Health Unit</th>
                                <th>Action</th>
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
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Type of Health UNit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/admin/health_unit_update/{{$type_of_health_unit->id}}">
          @csrf
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-12">
                        <!-- text input -->
                          <div class="form-group">
                              <label>Type of Health Unit</label>
                              <input type="text" class="form-control" value="{{ $type_of_health_unit->name}}" name="name" :value="old('name')" />
                          </div>
                      </div>
                  </div>
              </div>
      </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]/
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
    
@endsection
