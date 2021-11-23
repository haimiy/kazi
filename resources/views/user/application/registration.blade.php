@extends('layouts.user_app')
@section('title', '')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}" />

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
                    @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        {{ Session::get('success_message') }}
                    </div>
                    @endif
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="application-form-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="pill" href="#step1" role="tab" id="tab-btn-1" >General Facility Info</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step2" role="tab" id="tab-btn-2" >Facility Location</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="pill" href="#step3" role="tab" id="tab-btn-3" >Nearest Hospital</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step4" role="tab" id="tab-btn-4" >Services Offered</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step5" role="tab" id="tab-btn-5" >Staffing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step6" role="tab" id="tab-btn-6" >Premises</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step7" role="tab" id="tab-btn-7" >Number of Beds</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#step8" role="tab" id="tab-btn-8" >Other</a>
                                    </li>
                                </ul>
                        </div>
                        <div class="card-body">
                            <form id="application-form" action="/user/store_applicant_registration_form" method="POST" >
                                @csrf
                                <div class="tab-content">
                                    @include('user.application.partial.general_info')
                                    @include('user.application.partial.location')
                                    @include('user.application.partial.nearest_hospital')
                                    @include('user.application.partial.services_offered')
                                    @include('user.application.partial.staffing')
                                    @include('user.application.partial.premises')
                                    @include('user.application.partial.no_of_beds')
                                    @include('user.application.partial.other')
                                </div>
                            </form>
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
         $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });

         function changeTab(btnNumber) {
             let tabBtn = $("#tab-btn-"+btnNumber)
             tabBtn.click()
         }

         function submitForm() {

         }
        function other(that){
            if(that.value == "8"){
                document.getElementById('other').style.display = "block";
            }else{
                document.getElementById('other').style.display = "none";
            }
        }
        function authority(that){
            if(that.value == "5"){
                document.getElementById('authority').style.display = "block";
            }else{
                document.getElementById('authority').style.display = "none";
            }
        }
        //  // BS-Stepper Init
        // document.addEventListener('DOMContentLoaded', function () {
        //     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        // });

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

         $("#application-form").submit(function (e) {
             e.preventDefault();

             $.ajax({
                 url:$(this).attr('action'),
                 method:$(this).attr('method'),
                 data:new FormData(this),
                 processData:false,
                 dataType:'json',
                 contentType:false,
                 success: function (response) {
                     console.log(response)
                 },
                 error:function () {

                 }
             });
         });

        </script>


@endsection
