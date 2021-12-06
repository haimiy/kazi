@extends('layouts.user_app')
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
                                </ul>
                        </div>
                        <div class="card-body">
                            <form id="application-form" action="/user/store_applicant_registration_form" method="POST" >
                                @csrf
                                <div class="tab-content">
                                    @include('inspector.partials.general_info')
                                    @include('inspector.partials.location')
                                    @include('inspector.partials.nearest_hospital')
                                    @include('inspector.partials.services_offered')
                                    @include('inspector.partials.staffing')
{{--                                    @include('inspector.partials.premises')--}}
{{--                                    @include('inspector.partials.no_of_beds')--}}
{{--                                    @include('inspector.partials.other')--}}
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
        let currentTab = 1;
         $(function () {
    //Initialize Select2 Elements
        $('.select2').select2()

        });

         function changeCurrentTabVal(tabNumber) {
             console.log(currentTab)
             console.log(tabNumber)

             currentTab = tabNumber;
         }
         function changeTab(btnNumber) {
             if (!window["validateTab"+currentTab]()){
                 return;
             }
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

         // $("#application-form").validate({
         //     submitHandler: function(form) {
         //         if (){
         //             console.log("kakak");
         //         }
         //
         //     }
         // });

        $("#application-form").submit(function (e) {
           e.preventDefault();
           if (validateTab8()){
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
                           $('#application-form')[0].reset();
                           $("#tab-btn-1").click();

                       }
                   },
                   error:function () {

                   }
               });
           }

        });

        function validateTab1(){
            let isValid = true;
            if ($("#type_of_health_unit_id").val().trim().length === 0){
                $("#type_of_health_unit_id_error").html('This field is required')
                isValid = false;
            }else {
                $("#type_of_health_unit_id_error").html('')
            }

            if ($("#authority_responsible_id").val().trim().length === 0){
                $("#authority_responsible_id_error").html('This field is required')
                isValid = false;
            }else {
                $("#authority_responsible_id_error").html('')
            }

            if ($("#starting_operation_date").val().trim().length === 0){
                $("#starting_operation_date_error").html('This field is required')
                isValid = false;
            }else {
                $("#starting_operation_date_error").html('')
            }

            if ($("#facility_name").val().trim().length === 0){
                $("#facility_name_error").html('This field is required')
                isValid = false;
            }else {
                $("#facility_name_error").html('')
            }

            if ($("#full_name").val().trim().length === 0){
                $("#full_name_error").html('This field is required')
                isValid = false;
            }else {
                $("#full_name_error").html('')
            }
            if ($("#qualification").val().trim().length === 0){
                $("#qualification_error").html('This field is required')
                isValid = false;
            }else {
                $("#qualification_error").html('')
            }



            return isValid;
        }
        function validateTab2(){
            let isValid = true;
            if ($("#street").val().trim().length === 0){
                $("#street_error").html('This field is required')
                isValid = false;
            }else {
                $("#street_error").html('')
            }
            if ($("#address").val().trim().length === 0){
                $("#address_error").html('This field is required')
                isValid = false;
            }else {
                $("#address_error").html('')
            }
            if ($("#village").val().trim().length === 0){
                $("#village_error").html('This field is required')
                isValid = false;
            }else {
                $("#village_error").html('')
            }
            if ($("#ward").val().trim().length === 0){
                $("#ward_error").html('This field is required')
                isValid = false;
            }else {
                $("#ward_error").html('')
            }
            if ($("#district_id").val().trim().length === 0){
                $("#district_id_error").html('This field is required')
                isValid = false;
            }else {
                $("#district_id_error").html('')
            }
            if ($("#region").val().trim().length === 0){
                $("#region_error").html('This field is required')
                isValid = false;
            }else {
                $("#region_error").html('')
            }

            if ($("#latitude").val().trim().length === 0){
                $("#latitude_error").html('This field is required')
                isValid = false;
            }else {
                $("#latitude_error").html('')
            }
            if ($("#longitude").val().trim().length === 0){
                $("#longitude_error").html('This field is required')
                isValid = false;
            }else {
                $("#longitude_error").html('')
            }

            return isValid;
        }
        function validateTab3(){
            let isValid = true;
            if ($("#nearest_hospital_name").val().trim().length === 0){
                $("#nearest_hospital_name_error").html('This field is required')
                isValid = false;
            }else {
                $("#nearest_hospital_name_error").html('')
            }
            if ($("#nearest_hospital_owner").val().trim().length === 0){
                $("#nearest_hospital_owner_error").html('This field is required')
                isValid = false;
            }else {
                $("#nearest_hospital_owner_error").html('')
            }
            if ($("#nearest_hospital_distance").val().trim().length === 0){
                $("#nearest_hospital_distance_error").html('This field is required')
                isValid = false;
            }else {
                $("#nearest_hospital_distance_error").html('')
            }
            if ($("#nearest_hospital_type_of_health_unit").val().trim().length === 0){
                $("#nearest_hospital_type_of_health_unit_error").html('This field is required')
                isValid = false;
            }else {
                $("#nearest_hospital_type_of_health_unit_error").html('')
            }

            return isValid;
        }
        function validateTab4(){
            return true;
        }
        function validateTab5(){
            return true;
        }
        function validateTab6(){
            return true;
        }
        function validateTab7(){
            return true;
        }
        function validateTab8(){

            let stateId =$('input[name="building-part-state-id[]"]').map(function(){return $(this).val();}).get();
            let isValid = true;
            stateId.forEach(function (id){
                if ($('input[name="building-part-state-'+id+'"]:checked').val() === undefined){
                    isValid = false;
                    $('#building-part-state-'+id+'-error').html('This field is required');
                    console.log('building-part-state-'+id)
                    console.log('fail')
                }else {
                    $('#building-part-state-'+id+'-error').html('');
                    console.log('pass')
                }
            });


            return isValid;
        }

        </script>


@endsection
