@extends('layouts.registrar_app')
@section('title', 'Registrar | Compose')
@section('css')
    
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
                              @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="/registrar/store_send_message_interface">
                  @csrf
                  <div class="form-group">
                  <select class="select2" multiple="multiple" name="recepients[]" data-placeholder="To:" style="width: 100%;">
                    @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->phone_no }}">{{ $hospital->facility_name.' ( '.$hospital->phone_no.' ) ' }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" placeholder="Subject:"></textarea>
                </div>
               
                </div>
              <!-- /.card-body -->
                <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
              <!-- /.card-footer -->
                </form>
                
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });
  //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
</script>
@endsection
