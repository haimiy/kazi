<?php

namespace App\Http\Controllers;

use App\Helper\FunctionHelper;
use App\Imports\HealthFacilityExistingDataImport;
use App\Models\License;
use App\Models\HealthFacility;
use App\Models\Registration;
use App\Models\Location;
use App\Models\Role;
use App\Models\RegistrationRegistrarReview;
use App\Services\DataService;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function index()
    {
        $health_facility_count = License::count();
        return view('registrar.index', [
            'health_facility_count' => $health_facility_count
        ]);
    }

     public function showUsers(){
        $roles = Role::all();
        $users = DB::select('SELECT users.*,roles.role_name FROM users  INNER JOIN roles
        ON  users.role_id = roles.id ORDER by users.first_name ');
        return view('registrar.users_show', [
            'users' => $users,
            'roles' => $roles,

        ]);
    }

    public function applicationList()
    {
        $list_of_applications = DB::select("SELECT u.first_name, u.middle_name, u.last_name, hf.*,r.id, r.status FROM registration r
        LEFT JOIN health_facility hf ON r.health_facility_id = hf.id
        LEFT JOIN users u ON u.id = hf.user_id where r.status = 'Inspected' OR r.status = 'Rejected'");
        return view('registrar.list_of_application', [
            'list_of_applications' => $list_of_applications,
        ]);
    }

    public function detailedListOfApplication($id){
        $application = DB::select("SELECT r.id,r.starting_operation_date,r.nearest_hospital_name,r.nearest_hospital_distance,r.nearest_hospital_owner,r.nearest_hospital_type_of_health_unit,r.status,r.application_ref_no,r.created_at,r.updated_at,hf.type_of_health_unit_specified,r.authority_responsible_specified,
       tohu.name as type_of_health_unit,tohu.prefix,
       ar.name as authority_responsible,
       hf.facility_name,hf.id facility_id,hf.reg_no,
       di.full_name,di.qualification,
       l.region,l.latitude,l.longitude,l.street,l.address,l.village,l.ward,po_box,
       d.name district,
       u.first_name, u.middle_name,u.last_name,
       o.id owner_id,o.person_incharge,o.ownership_type,o.designation,
       concat(u.first_name,concat(' ',concat(u.middle_name,concat(' ',u.last_name)))) user_name,
       org.org_name
from registration r   
    left join authority_responsible ar on ar.id = r.authority_responsible_id
    left join health_facility hf on hf.id = r.health_facility_id
    left join owner_health_facility ohf on hf.id = ohf.health_facility_id
    left join type_of_health_unit tohu on tohu.id = hf.type_of_health_unit_id
    left join owner o on ohf.owner_id = o.id
    left join users u on o.person_incharge = u.id
    left join organisation org on o.id = org.owner_id
    left join doctor_incharge di on hf.doctor_incharge_id = di.id
    left join location l on hf.location_id = l.id
    left join district d on l.district_id = d.id where r.id =".$id);

        $services = DB::select('select * from health_facility_services_offered hfso left outer join type_of_services tos on tos.id = hfso.type_of_services_id left join health_facility hf on hf.id = hfso.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id='.$id);

        $staffing = DB::select('select s.id,s.no_of_full_time,s.no_of_part_time,o.name occupation,s.is_specified,s.specified_occupation from staffing s left join occupation o on s.staff_occupation_id = o.id left join health_facility hf on hf.id = s.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $premises = DB::select('select p.id,p.rooms_no number_of_room,p.is_specified,p.specified_premises_type,pt.name premises_type from premises p left join premises_type pt on p.premise_type_id = pt.id left join health_facility hf on hf.id = p.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $noOfBeds = DB::select('select nobbtow.id,nobbtow.is_specified,nobbtow.specified_ward_type,nobbtow.no_of_beds,tow.name type_of_ward from no_of_beds_by_type_of_ward nobbtow left join type_of_ward tow on tow.id = nobbtow.type_of_ward_id left join health_facility hf on hf.id = nobbtow.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id='.$id);

        $buildingParts = DB::select('select bs.id,bs.state,bs.comments,bp.name building_part,bs.health_facility_id from building_status bs left join building_parts bp on bp.id = bs.building_parts_id left join health_facility hf on hf.id = bs.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $sanitation = DB::select('select hfts.* from health_facility_toilet_sanitation hfts  left join health_facility hf on hf.id = hfts.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $waterSupplies = DB::select('select hfws.* from health_facility_water_supply hfws left join health_facility hf on hf.id = hfws.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $wasteDisposal = DB::select('select hfwd.* from health_facility_waste_disposal hfwd left join health_facility hf on hf.id = hfwd.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $comments = DB::select('select * from health_facility_inspection left join health_facility_inspection_comments hfic on health_facility_inspection.id = hfic.health_facility_inspection_id left join health_facility hf on hf.id = health_facility_inspection.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id='.$id);

        return view('registrar.view_registration', [
            'application'=>$application[0],
            'services'=>$services,
            'staffing'=>$staffing,
            'premises'=>$premises,
            'noOfBeds'=>$noOfBeds,
            'buildingParts'=>$buildingParts,
            'sanitation'=>$sanitation[0],
            'waterSupply'=>$waterSupplies[0],
            'wasteDisposal'=>$wasteDisposal[0],
            'comments'=>$comments
        ]);
    }

    public function LicencesList(){
        $licenses = DB::select('SELECT
           l.id,l.license_no,l.starting_date,l.ending_date,
           hf.facility_name,
           u.first_name,u.last_name,u.middle_name
        from license l
        left join health_facility hf on hf.id = l.health_facility_id
        left join owner_health_facility ohf on hf.id = ohf.health_facility_id
        left join owner o on ohf.owner_id = o.id
        left join users u on u.id=o.person_incharge');
        return view('registrar.licences' , [
            'licenses' => $licenses,
        ]);
    }
        public function decision()
    {
        return view('registrar.decision_create');
    }

    public function storeDecision(Request $request)
    {
        $request['review_type'] = 'fixed Review';
        $request['registrar_id'] = auth()->user()->id;
        $request['license_no'] = $request->prefix.'/0'.$request->health_facility_id;

        RegistrationRegistrarReview::create($request->all());
        if ($request->review == 'Accepted'){
            $licence = License::create($request->all());
            DB::table('license_histories')->insert([
                'license_no'=>$request->license_no,
                'date_of_issue'=>$licence->created_at,
                'expiry_date' => $request->ending_date,
                'owner_id' => $request->owner_id
            ]);
        }

        $registration = Registration::find($request->registration_id);
        $registration->status = $request->review;
        $registration->save();
        return redirect('/registrar/application_list');
    }

    public function importExistingData(){
        $private_hospitals = DB::select('SELECT
           l.id,l.license_no,l.starting_date,l.ending_date,
           hf.*,
           u.first_name,u.last_name,u.middle_name
        from license l
        left join health_facility hf on hf.id = l.health_facility_id
        left join owner_health_facility ohf on hf.id = ohf.health_facility_id
        left join owner o on ohf.owner_id = o.id
        left join users u on u.id=o.person_incharge');
        return view('registrar.import', [
            'private_hospitals' => $private_hospitals
        ]);
    }
    public function detailedListOfHealthFacility($id){
        $hospital = DB::select('SELECT hf.*,l.*,d.*,o.*,u.*,hfso.*,dr.*,
            lo.id as location_id,lo.street,lo.ward,lo.village,lo.latitude,lo.longitude,lo.district_id,
            s.*, tohu.name as typeOfHealthUnit FROM health_facility hf 
            left join owner_health_facility ohf on hf.id = ohf.health_facility_id
            left join license l on hf.id = l.health_facility_id
            left join owner o on ohf.owner_id = o.id
            left join users u on u.id=o.person_incharge
            left join health_facility_services_offered hfso on hf.id = hfso.health_facility_id
            left join doctor_incharge dr on dr.id = hf.doctor_incharge_id
            left join staffing s on hf.id = s.health_facility_id
            left join location lo on lo.id = hf.location_id
            left join type_of_health_unit tohu on tohu.id = hf.type_of_health_unit_id
            left join district d on d.id = lo.district_id where hf.id = '.$id);

        $services = DB::select('SELECT * FROM health_facility_services_offered hfso 
            left outer join type_of_services tos on tos.id = hfso.type_of_services_id 
            left join health_facility hf on hf.id = hfso.health_facility_id 
            left join registration r on hf.id = r.health_facility_id where hf.id='.$id);
        $inspector_id = DB::select('SELECT hfi.inspector_id,hf.facility_name,u.* FROM health_facility_inspection hfi
            LEFT JOIN health_facility hf on hf.id = hfi.health_facility_id
            LEFT JOIN users u on u.id = hfi.inspector_id where hfi.health_facility_id ='.$id);
        return view('registrar.health_facility.detailed_list_of_health_facility', [
            'hospital'=>$hospital[0],
            'services'=>$services,
       ]);
    }

    public function updateLocation(Request $request, $location_id){
    $updateLatitudeAndLongitude = Location::where('id',$location_id)->update([
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);
    return back();
    }

    public function byGeneral(){
        $private_hospitals = DB::select('SELECT hf.id,district.name as district, hf.facility_name, hf.reg_no, hf.status, l.starting_date, u.first_name, u.middle_name, u.last_name FROM health_facility hf 
            left join owner_health_facility ohf on hf.id = ohf.health_facility_id
            left join location on location.id = hf.location_id
            left join district on district.id = location.district_id 
            left join license l on hf.id = l.health_facility_id
            left join owner o on ohf.owner_id = o.id
            left join users u on u.id=o.person_incharge');
        return view('registrar.health_facility.by_general', [
            'private_hospitals' => $private_hospitals
        ]);
    }
    public function byDistrict(){
        $private_hospitals = DB::select('SELECT GROUP_CONCAT(hf.facility_name) facility_name, district.name as district,hf.id,hf.reg_no, hf.status, l.starting_date, u.first_name, u.middle_name, u.last_name FROM health_facility hf 
            left join owner_health_facility ohf on hf.id = ohf.health_facility_id
            left join location on location.id = hf.location_id
            left join district on district.id = location.district_id 
            left join license l on hf.id = l.health_facility_id
            left join owner o on ohf.owner_id = o.id
            left join users u on u.id=o.person_incharge GROUP BY district.id');
        return view('registrar.health_facility.by_district', [
            'private_hospitals' => $private_hospitals
        ]);
    }
    public function byLevel(){
        $private_hospitals = DB::select('SELECT GROUP_CONCAT(hf.facility_name) facility_name, district.name as district,hf.id,hf.reg_no,tohu.name as typeOfHealthUnit, hf.status, l.starting_date, u.first_name, u.middle_name, u.last_name FROM health_facility hf 
            left join owner_health_facility ohf on hf.id = ohf.health_facility_id
            left join type_of_health_unit tohu on tohu.id = hf.type_of_health_unit_id
            left join location on location.id = hf.location_id
            left join district on district.id = location.district_id 
            left join license l on hf.id = l.health_facility_id
            left join owner o on ohf.owner_id = o.id
            left join users u on u.id=o.person_incharge GROUP BY tohu.id');
        return view('registrar.health_facility.by_level', [
            'private_hospitals' => $private_hospitals
        ]);
    }

    public function storeImportExistingData(Request $request){
//        Excel::import(new HealthFacilityExistingDataImport, $request->file('file')->store('temp'));
        $rows =Excel::toArray(new HealthFacilityExistingDataImport, $request->file('file')->store('temp'));
        $i = 0;
        foreach ($rows[0] as $row){
            if ($i != 0){
                $format = 'd/m/Y';
                $userId = DataService::createUserAndReturnId($row);
                $ownerID = DataService::createOwnerAndReturnId($row,$userId);
                if ($row[5] == 'Company'){
                    DataService::createOrganization($row,$ownerID);
                }
                $healthFacilityId = DataService::createHealthFacility($row,$ownerID);

                DataService::createLicence($row,$ownerID,$healthFacilityId);
//                dd($healthFacilityId);
            }
            $i++;
        }
        return back();
    }
}
