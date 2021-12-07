<?php


namespace App\Services;


use App\Helper\FunctionHelper;
use App\Models\DoctorIncharge;
use App\Models\HealthFacility;
use App\Models\License;
use App\Models\Location;
use App\Models\Organisation;
use App\Models\OwnershipHealthFacility;
use DB;

class DataService
{
    static public function createUserAndReturnId($row): int
    {
        return DB::table('users')->insertGetId([
            'first_name'=>$row[0],
            'middle_name'=>$row[1],
            'last_name'=>$row[2],
            'role_id'=>5,
            'phone_no'=>'0'.$row[3],
            'password'=>\Hash::make("hahahaha")
        ]);
    }

    static public function createOwnerAndReturnId($row,$userId){
        return DB::table('owner')->insertGetId([
            'person_incharge'=>$userId,
            'owner_names'=>$row[6],
            'designation'=>$row[4],
            'ownership_type'=>$row[5],
        ]);
    }
    static public function createOrganization($row,$ownerId){
        Organisation::create([
            'org_name'=>$row[7],
            'type'=>$row[9],
            'company_phone_no'=>$row[8],
            'owner_id'=>$ownerId,
        ]);
    }

    static public function createHealthFacility($row,$ownerId){
        $doctor_incharge = DoctorIncharge::create([
            'full_name'=>$row[14],
            'qualification'=>$row[15],
        ]);
        $location =Location::create([
            'street'=>$row[16],
            'address'=>$row[17],
            'village'=>$row[18],
            'ward'=>$row[19],
            'po_box'=>$row[20],
            'region'=>$row[21],
            'district_id'=>$row[22],
            'latitude'=>$row[23],
            'longitude'=>$row[24],
        ]);

        $health_facility = HealthFacility::create([
            'facility_name'=>$row[26],
            'reg_no'=>$row[10],
            'doctor_incharge_id'=>$doctor_incharge->id,
            'location_id'=>$location->id,
            'type_of_health_unit_id'=>$row[13],
            'remark'=>$row[12],
            'status'=>$row[11],
        ]);
        $ownerHealthFacility = OwnershipHealthFacility::create([
            'owner_id'=>$ownerId,
            'health_facility_id'=>$health_facility->id,
        ]);

        $services = explode(',',$row[29]);

        foreach ($services as $service){
            DB::table('health_facility_services_offered')->insert([
                'health_facility_id'=>$health_facility->id,
                'type_of_services_id'=>22,
                'is_specified'=>true,
                'specified_services'=>$service,
                'have_additional_requirement_question'=>false,
            ]);
        }

        DB::table('staffing')->insert([
            'staff_occupation_id'=>31,
            'no_of_full_time'=>$row[32],
            'health_facility_id'=>$health_facility->id,
            'is_specified'=>false,
        ]);


        return $health_facility->id;
    }
    static public function createLicence($row,$ownerId,$health){
        License::create([
            'license_no'=>$row[25],
            'owner_id'=>$ownerId,
            'health_facility_id'=>$health,
            'starting_date'=>FunctionHelper::changeExcelDate($row[27]),
            'ending_date'=>FunctionHelper::changeExcelDate($row[28]),
        ]);
    }
    static public function nana(){

    }
}
