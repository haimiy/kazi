<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorityResponsible;
use App\Models\BuildingPart;
use App\Models\District;
use App\Models\Role;
use App\Models\TypeOfWaterSupply;
use App\Models\User;
use App\Models\Owner;
use App\Models\Staffing;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoctorIncharge;
use App\Models\GeneralFacilityInfo;
use App\Models\HealthFacility;
use App\Models\Location;
use App\Models\Occupation;
use App\Models\Organisation;
use App\Models\PremisesType;
use App\Models\Registration;
use App\Models\TypeOfHealthUnit;
use App\Models\TypeOfService;
use App\Models\TypeOfWard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ApplicationController extends Controller
{
     public function showApplicantRegistrationForm(){
        $ownerModel = Owner::where('person_incharge',auth()->user()->id)->get();
//        if ($ownerModel->)
//        $owner =
        $type_of_health_units = TypeOfHealthUnit::all();
        $authorities = AuthorityResponsible::all();
        $districts = District::all();
        $services = TypeOfService::all();
        $occupations = Occupation::all();
        $premiseTypes = PremisesType::all();
        $typeOfWards = TypeOfWard::all();
        $buildingParts = BuildingPart::with('state')->get();
        $waterSupplies = TypeOfWaterSupply::all();
        $typeOfToilets = ['None', 'Flush', 'Pit latrine'];
        $stateOfToilets = ['clean', 'Dirty', 'Not in use'];
        $stateOfToilets = ['clean', 'Dirty', 'Not in use'];
        $sewerageSystems = ['Non', 'Not functioning', 'Leaking over flowing'];
        $wasteDisposals = [
            [
                "name"=>"Surroundings",
                "list"=>['Clean', 'Dirty'],
            ],
            [
                "name"=>"Waste basket/dust bin",
                "list"=>['None', 'Present'],
            ],
            [
                "name"=>"Dumping site",
                "list"=>['None', 'Dirty', 'Cared for and clean'],
            ],
            [
                "name"=>"Incinerator",
                "list"=>['None', 'Not functioning', 'Functioning'],
            ],
        ];

        return view('user.application.registration', [
            'type_of_health_units' => $type_of_health_units,
            'authorities' => $authorities,
            'districts' => $districts,
            'services' => $services,
            'occupations'=>$occupations,
            'premiseTypes'=>$premiseTypes,
            'typeOfWards'=>$typeOfWards,
            'buildingParts'=>$buildingParts,
            'waterSupplies'=>$waterSupplies,
            'stateOfToilets'=>$stateOfToilets,
            'sewerageSystems'=>$sewerageSystems,
            'wasteDisposals'=>$wasteDisposals,
            'ownerModel' => $ownerModel,
        ]);
    }

    public function storeApplicantRegistrationForm(Request $request): \Illuminate\Http\RedirectResponse
    {
        $doctor_incharge = new DoctorIncharge();
        $doctor_incharge->full_name = $request->full_name;
        $doctor_incharge->qualification = $request->qualification;
        $doctor_incharge->user_id = auth()->user()->id ;
        $doctor_incharge->save();

        $location = Location::create($request->all());
        $location->user_id = auth()->user()->id;
        $location->save();

        $health_facility = new HealthFacility();
        $health_facility->facility_name = $request->facility_name;
        $health_facility->reg_no = $request->reg_no;
        $health_facility->user_id = auth()->user()->id;
        $health_facility->doctor_incharge_id = $doctor_incharge->id;
        $health_facility->location_id = $location->id;
        $health_facility->save();

        $registration = new  Registration();
        $registration->type_of_health_unit_id = $request->type_of_health_unit_id;
        $registration->type_of_health_unit_specified = $request->type_of_health_unit_specified;
        $registration->authority_responsible_id = $request->authority_responsible_id;
        $registration->authority_responsible_specified = $request->authority_responsible_specified;
        $registration->starting_operation_date = $request->starting_operation_date;
        $registration->nearest_hospital_name = $request->nearest_hospital_name;
        $registration->nearest_hospital_owner = $request->nearest_hospital_owner;
        $registration->nearest_hospital_distance = $request->nearest_hospital_distance;
        $registration->nearest_hospital_type_of_health_unit = $request->nearest_hospital_type_of_health_unit;
        $registration->service_type_id = $request->service_type_id;
        $registration->have_additional_requirement = $request->have_additional_requirement;
        $registration->additional_requirement = $request->additional_requirement;
        $registration->user_id = auth()->user()->id ;
        $registration->health_facility_id = $health_facility->id ;
        $registration->save();

        $owner = new Owner();
        $owner->person_incharge = auth()->user()->id;
        $owner->save();
        Session::flash('success_message', 'Data Inserted Successfull!');
        return redirect()->back();
    }

}
