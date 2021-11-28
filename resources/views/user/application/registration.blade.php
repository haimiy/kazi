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
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
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
         // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });

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

       // $("#application-form").validate({
       //    rules: {
       //      starting_operation_date: { required:true},
       //      full_name: { required:true},
       //      qualification: { required:true},
       //      street: { required:true},
       //      address: { required:true},
       //      village: { required:true},
       //      ward: { required:true},
       //      po_box: { required:true},
       //      region: { required:true},
       //      nearest_hospital_name: { required:true},
       //      nearest_hospital_distance: { required:true},
       //      toilet-sanitation-type-of-toilet: { required:true},
       //      toilet-sanitation-type-for-group: { required:true},
       //      toilet-sanitation-type-for-gender: { required:true},
       //      toilet-sanitation-state-of-toilet: { required:true},
       //      toilet-sanitation-sewerage-system: { required:true},
       //      is-water-adequate: { required:true},
       //      water-for-drink: { required:true},
       //      source-of-water-opt: { required:true},
       //      waste-disposal-surroundings: { required:true},
       //      waste-disposal-waste-basket-dust-bin: { required:true},
       //      waste-disposal-dumping-site: { required:true},
       //      waste-disposal-incinerator: { required:true},
       //    },
       //    message: {

       //    starting_operation_date: "please enter starting date",
       //    full_name: "please enter name of doctor incharge",
       //    qualification: "please enter qualification of doctor incharge",
       //    street: "please enter name of street",
       //    address: "please enter name of address",
       //    village: "please enter name of village",
       //    ward: "please enter name of ward",
       //    po_box: "please enter po box",
       //    region: "please enter region",
       //    nearest_hospital_name: "please enter nearest hospital name",
       //    nearest_hospital_distance: "please enter nearest hospital distance",
       //    nearest_hospital_name: "please enter nearest hospital name",
       //    toilet-sanitation-type-of-toilet: "please select type of toilet",
       //    toilet-sanitation-type-for-group: "please select type for group",
       //    toilet-sanitation-type-for-gender: "please select type for gender",
       //    toilet-sanitation-state-of-toilet: "please select state of toilet",
       //    toilet-sanitation-sewerage-system: "please select sewage system",
       //    is-water-adequate: "please select",
       //    water-for-drink: "please select",
       //    source-of-water-opt: "please select",
       //    waste-disposal-surroundings: "please select",
       //    waste-disposal-waste-basket-dust-bin: "please select",
       //    waste-disposal-dumping-site: "please select",
       //    waste-disposal-incinerator: "please select",
       //    }

       //  });

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
                if (response.success) {
                  iziToast.success({
                      title: 'Success',
                      message: response.message,
                      position: 'topRight'
                    });
                }
               },
               error:function () {

               }
           });
        });
            
        </script>


@endsection
