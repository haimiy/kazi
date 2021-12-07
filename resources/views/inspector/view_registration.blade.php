@extends('layouts.inspector_app')
@section('title', '')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}" />
    <style>

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
              <li class="breadcrumb-item active">Health Facility Registration</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="application-form-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="pill" href="#step1" role="tab" id="tab-btn-1" onclick="changeCurrentTabVal(1)">General Facility Info</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step2" role="tab" id="tab-btn-2" onclick="changeCurrentTabVal(2)">Facility Location</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step3" role="tab" id="tab-btn-3" onclick="changeCurrentTabVal(3)" >Nearest Hospital</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step4" role="tab" id="tab-btn-4" onclick="changeCurrentTabVal(4)" >Services Offered</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step5" role="tab" id="tab-btn-5" onclick="changeCurrentTabVal(5)" >Staffing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step6" role="tab" id="tab-btn-6" onclick="changeCurrentTabVal(6)" >Premises</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step7" role="tab" id="tab-btn-7" onclick="changeCurrentTabVal(7)" >Number of Beds</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step8" role="tab" id="tab-btn-8" onclick="changeCurrentTabVal(8)" >Other</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step9" role="tab" id="tab-btn-9" onclick="changeCurrentTabVal(9)" >Comments</a>
                                    </li>
                                </ul>
                        </div>
                        <div class="card-body">
                                @csrf
                                <div class="tab-content">
                                    @include('inspector.partials.general_info')
                                    @include('inspector.partials.location')
                                    @include('inspector.partials.nearest_hospital')
                                    @include('inspector.partials.services_offered')
                                    @include('inspector.partials.staffing')
                                    @include('inspector.partials.premises')
                                    @include('inspector.partials.no_of_beds')
                                    @include('inspector.partials.other')
                                    @include('inspector.partials.comments')
                                </div>
                        </div>
                      <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
    <!-- BS-Stepper -->
    <script>
        let currentTab = 1;
         $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });

         function changeCurrentTabVal(tabNumber) {
             currentTab = tabNumber;
         }
         function changeTab(btnNumber) {
             let tabBtn = $("#tab-btn-"+btnNumber)
             tabBtn.click()
         }


        function showAdditionalRequirement(id) {
            let yesInput = $('input[name="service-offered-'+id+'"]:checked');
            // let ids = $('input[name="service-ids[]"]');  // this is for get all ids
            let additionalDiv = $('#service-offered-add-requirement-div-'+id);


            if (yesInput.val() === "YES")
                additionalDiv.show();
            else
                additionalDiv.hide()
        }

        function showSpecify(id) {
            let yesInput = $('input[name="service-offered-'+id+'"]:checked');
            let specifyDiv = $('#service-specify-div-'+id)
            if (yesInput.val() === "YES")
                specifyDiv.show();
            else
                specifyDiv.hide()
        }
        </script>


@endsection
