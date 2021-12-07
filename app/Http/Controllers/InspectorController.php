<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InspectorController extends Controller
{
    public function index()
    {
        return view('inspector.index');
    }
    public function applicationList()
    {
        $list_of_applications = DB::select("SELECT u.first_name, u.middle_name, u.last_name, hf.facility_name,r.id, r.status FROM registration r
        LEFT JOIN health_facility hf ON r.health_facility_id = hf.id
        LEFT JOIN users u ON u.id = hf.user_id where r.status = 'Pending'");
        return view('inspector.list_of_application', [
            'list_of_applications' => $list_of_applications,
        ]);
    }

     public function detailedListOfApplication($id){
        $application = DB::select('select r.id,r.starting_operation_date,r.nearest_hospital_name,r.nearest_hospital_distance,r.nearest_hospital_owner,r.nearest_hospital_type_of_health_unit,r.status,r.application_ref_no,r.created_at,r.updated_at,r.type_of_health_unit_specified,r.authority_responsible_specified,
       tohu.name as type_of_health_unit,
       ar.name as authority_responsible,
       hf.facility_name,hf.id facility_id,
       di.full_name,di.qualification,
       l.region,l.latitude,l.longitude,l.street,l.address,l.village,l.ward,po_box,
       d.name district
from registration r
    left join type_of_health_unit tohu on tohu.id = r.type_of_health_unit_id
    left join authority_responsible ar on ar.id = r.authority_responsible_id
    left join health_facility hf on hf.id = r.health_facility_id
    left join doctor_incharge di on hf.doctor_incharge_id = di.id
    left join location l on hf.location_id = l.id
    left join district d on l.district_id = d.id where r.id ='.$id);

        $services = DB::select('select * from health_facility_services_offered hfso left outer join type_of_services tos on tos.id = hfso.type_of_services_id left join health_facility hf on hf.id = hfso.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id='.$id);

        $staffing = DB::select('select s.id,s.no_of_full_time,s.no_of_part_time,o.name occupation,s.is_specified,s.specified_occupation from staffing s left join occupation o on s.staff_occupation_id = o.id left join health_facility hf on hf.id = s.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $premises = DB::select('select p.id,p.rooms_no number_of_room,p.is_specified,p.specified_premises_type,pt.name premises_type from premises p left join premises_type pt on p.premise_type_id = pt.id left join health_facility hf on hf.id = p.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $noOfBeds = DB::select('select nobbtow.id,nobbtow.is_specified,nobbtow.specified_ward_type,nobbtow.no_of_beds,tow.name type_of_ward from no_of_beds_by_type_of_ward nobbtow left join type_of_ward tow on tow.id = nobbtow.type_of_ward_id left join health_facility hf on hf.id = nobbtow.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id='.$id);

        $buildingParts = DB::select('select bs.id,bs.state,bs.comments,bp.name building_part,bs.health_facility_id from building_status bs left join building_parts bp on bp.id = bs.building_parts_id left join health_facility hf on hf.id = bs.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $sanitation = DB::select('select hfts.* from health_facility_toilet_sanitation hfts  left join health_facility hf on hf.id = hfts.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $waterSupplies = DB::select('select hfws.* from health_facility_water_supply hfws left join health_facility hf on hf.id = hfws.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        $wasteDisposal = DB::select('select hfwd.* from health_facility_waste_disposal hfwd left join health_facility hf on hf.id = hfwd.health_facility_id left join registration r on hf.id = r.health_facility_id where r.id ='.$id);

        return view('inspector.view_registration',[
            'application'=>$application[0],
            'services'=>$services,
            'staffing'=>$staffing,
            'premises'=>$premises,
            'noOfBeds'=>$noOfBeds,
            'buildingParts'=>$buildingParts,
            'sanitation'=>$sanitation[0],
            'waterSupply'=>$waterSupplies[0],
            'wasteDisposal'=>$wasteDisposal[0]
        ]);
    }

    public function comments(){
        return view('inspector.comments_create');
    }

     public function storeComments(Request $request)
    {
        $inspector = auth()->user()->id;

        $health_facility_inspection_id = DB::table('health_facility_inspection')->insertGetId([
            'health_facility_id'=>$request->health_facility_id,
            'inspector_id'=>$inspector
        ]);

        DB::table('health_facility_inspection_comments')->insertGetId([
            'health_facility_inspection_id'=>$health_facility_inspection_id,
            'comments'=>$request->comments,
            'inspector_guidelines_question_id'=>1
        ]);
        $registration = Registration::find($request->registration_id);
        $registration->status = 'Inspected';
        $registration->save();
        return redirect('/inspector/application_list');
    }


}
