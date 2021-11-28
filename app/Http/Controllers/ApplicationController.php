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
        $sewerageSystems = ['None', 'Not functioning', 'Leaking over flowing'];
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

    public function storeApplicantRegistrationForm(Request $request)
    {

//        dd($request['is_specified_type_of_services_22']);
//        dd($request);
        $doctorInCharge = DoctorIncharge::create($request->all());
        $location = Location::create($request->all());

        //Add additional field for health facility
        $request['user_id'] = auth()->user()->id;
        $request['doctor_incharge_id'] = $doctorInCharge->id;
        $request['location_id'] = $location->id;

        $healthFacility = HealthFacility::create($request->all());

        //Add additional field for Registration
        $request['health_facility_id'] = $healthFacility->id;

        //Service offered
        foreach ($request->type_of_services_id as $type_of_services_id){
            $serviceOffered = $request['service-offered-'.$type_of_services_id];
            if ($serviceOffered == 'YES'){
                //Insert only checked as YES service
                $is_specified = $request['is_specified_type_of_services_'.$type_of_services_id];
                if ($is_specified == '0'){
                    //for service that is dose not need user to specify service name
                    $have_additional_requirement_question = $request['have_additional_requirement_question_'.$type_of_services_id];
                    if ($have_additional_requirement_question == '1'){
                        //for service that dose not need user to specify service name and have specific question to answer
                        DB::table('health_facility_services_offered')->insert([
                            'health_facility_id'=>$healthFacility->id,
                            'type_of_services_id'=>$type_of_services_id,
                            'is_specified'=>false,
                            'have_additional_requirement_question'=>true,
                            'additional_requirement_question'=>$request['additional_requirement_question_'.$type_of_services_id],
                            'additional_requirement_answer'=>$request['additional_requirement_answer_'.$type_of_services_id],
                        ]);
                    }else{
                        //for service that dose not need user to specify service name and dose not have specific question to answer
                        DB::table('health_facility_services_offered')->insert([
                            'health_facility_id'=>$healthFacility->id,
                            'type_of_services_id'=>$type_of_services_id,
                            'is_specified'=>false,
                            'have_additional_requirement_question'=>false,
                        ]);
                    }
                }
                else{
                    //for service that need user to specify service name
                    $extraServices = explode(',',$request['specified_services_'.$type_of_services_id]);
                    foreach ($extraServices as $extraService){
                        DB::table('health_facility_services_offered')->insert([
                            'health_facility_id'=>$healthFacility->id,
                            'type_of_services_id'=>$type_of_services_id,
                            'is_specified'=>true,
                            'specified_services'=>trim($extraService,' '),
                            'have_additional_requirement_question'=>false,
                    ]);
                    }
                }
            }
        }

        //Staffing
        foreach ($request->staff_occupation_id as $staff_occupation_id){

            if ($request['no_of_full_time_'.$staff_occupation_id] != 0 || $request['no_of_part_time_'.$staff_occupation_id] != 0){
                //insert only occupation with staff available
                $is_specified = $request['is_specified_staff_occupation_'.$staff_occupation_id];
                if ($is_specified == '0'){
                    //with no specified occupation
                    DB::table('staffing')->insert([
                        'staff_occupation_id'=>$staff_occupation_id,
                        'no_of_full_time'=>$request['no_of_full_time_'.$staff_occupation_id],
                        'no_of_part_time'=>$request['no_of_part_time_'.$staff_occupation_id],
                        'health_facility_id'=>$healthFacility->id,
                        'is_specified'=>false,
                    ]);
                }else{
                    DB::table('staffing')->insert([
                        'staff_occupation_id'=>$staff_occupation_id,
                        'no_of_full_time'=>$request['no_of_full_time_'.$staff_occupation_id],
                        'no_of_part_time'=>$request['no_of_part_time_'.$staff_occupation_id],
                        'health_facility_id'=>$healthFacility->id,
                        'is_specified'=>true,
                        'specified_occupation'=>$request['specified_occupation_'.$staff_occupation_id],
                    ]);
                }

            }
        }

        //Premises
        foreach ($request->premise_type_id as $premise_type_id){
            if ($request['rooms_no_'.$premise_type_id] != 0){
                DB::table('premises')->insert([
                    'premise_type_id'=>$premise_type_id,
                    'health_facility_id'=>$healthFacility->id,
                    'rooms_no'=>$request['rooms_no_'.$premise_type_id],
                ]);
            }
        }

        foreach ($request->type_of_ward_id as $type_of_ward_id){
            $is_specified = $request['is_specified_type_of_ward_'.$type_of_ward_id];
            if ($request['no_of_beds_'.$type_of_ward_id]!=0){
                if ($is_specified == 0){
                    DB::table('no_of_beds_by_type_of_ward')->insert([
                        'type_of_ward_id'=>$type_of_ward_id,
                        'no_of_beds'=>$request['no_of_beds_'.$type_of_ward_id],
                        'health_facility_id'=>$healthFacility->id,
                    ]);
                }else{
                    DB::table('no_of_beds_by_type_of_ward')->insert([
                        'type_of_ward_id'=>$type_of_ward_id,
                        'no_of_beds'=>$request['no_of_beds_'.$type_of_ward_id],
                        'health_facility_id'=>$healthFacility->id,
                        'is_specified'=>true,
                        'specified_ward_type'=>$request['specified_ward_type_'.$type_of_ward_id],
                    ]);
                }
            }
        }

        //Other

        //Building
        foreach ($request['building-part-state-id'] as $building_part_state_id){
            DB::table('building_status')->insert([
                'building_parts_id'=>$building_part_state_id,
                'health_facility_id'=>$building_part_state_id,
                'state'=>$request['building-part-state-'.$building_part_state_id],
            ]);
        }

        // Sanitation
        DB::table('health_facility_toilet_sanitation')->insert([
            'health_facility_id'=>$healthFacility->id,
            'type_of_toilet'=>$request['toilet-sanitation-type-of-toilet'],
            'toilet_for_group'=>$request['toilet-sanitation-type-for-group'],
            'toilet_for_gender'=>$request['toilet-sanitation-type-for-gender'],
            'state_of_toilets'=>$request['toilet-sanitation-state-of-toilet'],
            'sewage_system'=>$request['toilet-sanitation-sewerage-system'],
        ]);

        //Water
        DB::table('health_facility_water_supply')->insert([
            'health_facility_id'=>$healthFacility->id,
            'is_water_adequate'=>$request['is-water-adequate'],
            'is_water_available_for_drink'=>$request['water-for-drink'],
            'source_of_water'=>implode(',',$request['source-of-water-opt']),
        ]);

        //Waste Disposal
        DB::table('health_facility_waste_disposal')->insert([
            'health_facility_id'=>$healthFacility->id,
            'surrounding_status'=>$request['waste-disposal-surroundings'],
            'waste_bin'=>$request['waste-disposal-waste-basket-dust-bin'],
            'dumping_site'=>$request['waste-disposal-dumping-site'],
            'incinerator'=>$request['waste-disposal-incinerator'],
        ]);

        $registration = Registration::create($request->all());   
         return response()->json([
            'success' => true,
            'message' => 'Registration form submitted successful!',
         ]);
    }

}
