@extends('layouts.user_app')
@section('title', '')
@section('css')
  <style>
    .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          {{-- <h5 class="mt-4 mb-2">Tabs in Cards</h5> --}}

          <div class="row">
            <div class="col-8">
              <!-- Custom Tabs -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-bullhorn" style="color: red;"></i> GENERAL REQUIREMENTS FOR ESTABLISMENT OF PRIVATE HEALTH FACILITIES.</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Owner</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Staffing and Operating Environment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-nb-tab" data-toggle="pill" href="#custom-content-below-nb" role="tab" aria-controls="custom-content-below-nb" aria-selected="false">N.B</a>
                    </li>
                  </ul>
                  
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                      <ol>
                        <li>The owner has to be a non-Government, an Individual, licensed healthcare provider or organization or registered company. The dispensary, clinics, health center and Hospitals will be supervised by a licensed Super specialist, Specialist or Medical Officer.
                        </li>
                        <li>Each licensed healthcare provider can only be allowed to supervise one facility with a clear mechanism of monitoring and evaluation of the quality of services provided by the facilities under their umbrellas.
                        </li>
                      </ol>
                     
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                      <ol>
                        <li>The Health practitioner who is the supervisor of the facility is only allowed to supervise one facility, which may be a clinic, polyclinics, specialized clinics, dispensaries or health centers. 
                        </li>
                        <li>Authorized health-care practitioner with current practicing license according to the relevant regulatory authorities should always be available at the health facility whenever it is open. 
                        </li>
                        <li>Facilities should only provide those authorized services according to their registration and licensure by the competent authority. If the owner wishes to offer more services in addition to those already approved, then the owner will have to re-apply for the new registration for the additional service if he/she want to add.
                        </li>
                        <li> The health practitioner supervisor (Doctor In charge) of the service /facility shall be present at all material time or working hours at that Hospital ready to receive and willing to give medical and or/dental treatment to patients.
                        </li>
                        <li> The health facility must employ the minimum number of health workers according to these guidelines.
                        </li>
                        <li> A suitable building must be available to cater for the establishment of a Dispensary or Health centre, Clinicsor Hospital.
                        </li>
                        <li> The health facility should be located in an environment that is conducive and free from noises and other disturbances. Places such as bar, dumping place, petrol station and market areas should be avoided. 
                        </li>
                        <li> No person shall be allowed to operate any health facility, without approval of appropriate authority.
                        </li>
                        <li> The facility should have reliable supply of safe /clean water (treated water), temporary water storage, adequate space, effective ventilation and adequate lighting system for the rooms offering different kinds of services.
                        </li>
                        <li> the facility should have toilets, shower or bathrooms that are disability friendly.
                        </li>
                        <li> the facility should have a sluice room, laundry or washing slab.
                        </li>
                        <li> the facility should have equipment, supplies and structures compliant with IPC guidelines. 
                        </li>
                        <li> The health facility should always use various latest guidelines for examination, diagnosis, treatment and other medical procedures or interventions issued by the MoHSWEGC. 
                        </li>
                        <li> the health facility must have essential equipment and supplies before offering different kinds of services. In addition, it shall ensure periodic calibration, verification, validation and maintenance of all medical equipment.
                        </li>
                        <li>There should be an established effective communication and referral system for the facility. Referred patients should be supported by health provider of respective facility.</li>
                        <li> Facilities offering inpatient services should own an ambulance/transport or there should be working arrangements for emergency transfer of patients.
                        </li>
                        <li> All facility shall have proper signages and a proper labeling system.
                        </li>
                        <li> each facility shall keep records on patients and other health information and produce reports on disease, morbidity and mortality promptly as required by the MoHSWEGC and submit to the District Data Officer (DDO).
                        </li>
                        <li> only those medicines allowed at that level of the health facility should be available. Medicines must be stored according to the manufacturer’s recommendation, should always be accompanied with records showing the source, proof of purchase, manufacturer, date of manufacture and date of expiry. Expired medicines should not be dispensed and should be disposed by the respective Authority in accordance to medicines disposal guidelines 
                        </li>
                        <li> all health professionals shall abide with their Code of Conduct and respective scope of practice. High-risk cases should be identified early and referred immediately to a facility, which can handle such cases competently.
                        </li>
                        <li> any professional malpractice, misconduct or negligence may result in professional disciplinary action, closure of the facility or criminal charges may be instituted by relevant authorities.
                        </li>
                        <li> the costing mechanisms for various health services provided should be made available to the MoHSWEGC on demand. Patients have the full right to get an invoice with full details on how the total cost is reached. Each charged component must be shown separately and not only the total final cost. All medical cost should be displayed that can be seen easily.
                        </li>
                        <li> there should be no advertising of services provided. Any signs or posters should not be more than 300 meters from each health facility and should only be for educational, information and directional purposes.
                        </li>
                        <li> Operations requiring regional or general anesthesia should only be done in Health centers or Hospitals under a trained anesthetic officer. 
                        </li>
                        <li> Independent pharmacies and laboratories are not allowed to examine and prescribe to patients. 
                        </li>
                        <li>every health facility must be insured against malpractice.
                        </li>
                        <li> Safety and security system of the building should be observed. Security system including alarm systems such as fire alarm, water flow alarm, fire and smoke detecting system. There should be fire extinguishers and the facility should be fenced.
                        </li>
                        <li> Hospital buildings must be constructed according to the specifications provided by the MoHCDEGC and PHAB. 
                        </li>
                        <li> The distance between the one health facility is atleast 3 KM.
                        </li>
                      </ol>
 
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-nb" role="tabpanel" aria-labelledby="custom-content-below-nb-tab">
                      <p><strong>N.B:  Any inspection of additional services,  or  any pre-approval Inspection  the cost of the Inspection will be covered by Owner him/her self which is 150,000/=  according to this Guideline.</strong></p> 
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- ./card -->
            </div>
            <!-- /.col -->
          </div>
        </div>
    </section>

</div>

@endsection

@section('js')
    
@endsection
