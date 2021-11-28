@extends('layouts.inspector_app')
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
              <li class="breadcrumb-item active">DataTables</li>
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
                          <h3 class="card-title">List of all Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Phone no.</th>
                              <th>Address</th>
                              <th>Role Name</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name . ' '. $user->middle_name . ' ' . $user->last_name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_no }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="text-center">
                                    @if ($user->role_name == "Admin")
                                    <span class="badge bg-danger">{{ $user->role_name }}</span>
                                    @elseif($user->role_name == "Owner")
                                    <span class="badge bg-warning">{{ $user->role_name }}</span>
                                    @elseif($user->role_name == "Inspector")
                                    <span class="badge bg-primary">{{ $user->role_name }}</span> 
                                    @elseif($user->role_name == "Registrar")
                                    <span class="badge bg-success">{{ $user->role_name }}</span> 
                                    @elseif($user->role_name == "SuperAdmin")
                                    <span class="badge bg-secondary">{{ $user->role_name }}</span> 
                                    @endif
                                    
                              </td>
                                <td class="text-center">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fa fa-pencil-alt m-r-5"></i> Edit</a>
                                            <form id="delete-{{$user->id}}" method="POST" style="display: inline" class="dropdown-item" action="/admin/delete_user/{{ $user->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <i onclick="deleteUser( {{$user->id}} )" class="fa fa-trash m-r-5">Delete</i>
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone no.</th>
                                <th>Address</th>
                                <th>Role Name</th>
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
