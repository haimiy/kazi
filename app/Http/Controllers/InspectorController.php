<?php

namespace App\Http\Controllers;

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
        $list_of_applications = DB::select('SELECT u.first_name, u.middle_name, u.last_name, hf.facility_name,r.id, r.status FROM registration r
        LEFT JOIN health_facility hf ON r.health_facility_id = hf.id
        LEFT JOIN users u ON u.id = hf.user_id');
        return view('inspector.list_of_application', [
            'list_of_applications' => $list_of_applications,
        ]);
    }

     public function detailedListOfApplication($id){
        $detailed_list = DB::select('SELECT ar.name as authName, tohu.name as tohuName,u.*, hf.*,r.*, l.*, dr.*, d.name as districtName, bs.*,bp.*,bps.*, hfts.*, ws.*, hfts.*,hfwd.*,hfso.*,tos.*, nb.*, w.*, p.*, pt.* FROM registration r
        LEFT JOIN health_facility hf ON hf.id = r.health_facility_id
        LEFT JOIN authority_responsible ar ON ar.id = r.authority_responsible_id
        LEFT JOIN type_of_health_unit tohu ON tohu.id = r.type_of_health_unit_id
        LEFT JOIN users u ON u.id = hf.user_id
        LEFT JOIN location l ON l.id = hf.location_id
        LEFT JOIN doctor_incharge dr ON dr.id = hf.location_id
        LEFT JOIN district d ON d.id = l.district_id
        LEFT JOIN building_status bs ON bs.health_facility_id = hf.id
        LEFT JOIN building_parts bp ON bp.id = bs.building_parts_id
        LEFT JOIN building_parts_state bps ON bps.building_part_id = bp.id
        LEFT JOIN health_facility_water_supply ws on ws.health_facility_id = hf.id
        LEFT JOIN health_facility_toilet_sanitation hfts ON hfts.health_facility_id = hf.id
        LEFT JOIN health_facility_waste_disposal hfwd ON hfwd.health_facility_id = hf.id
        LEFT JOIN health_facility_services_offered hfso ON hfso.health_facility_id = hf.id
        LEFT JOIN type_of_services tos ON tos.id = hfso.type_of_services_id
        LEFT JOIN no_of_beds_by_type_of_ward nb ON nb.health_facility_id = hf.id
        LEFT JOIN type_of_ward w ON w.id = nb.type_of_ward_id
        LEFT JOIN premises p ON p.health_facility_id = hf.id
        LEFT JOIN premises_type pt ON pt.id = p.premise_type_id where r.id='.$id);

        return view('inspector.view_registration');
    }

    public function comments(){
        return view('inspector.comments_create');
    }

     public function storeComments(Request $Request)
    {

    }


}
