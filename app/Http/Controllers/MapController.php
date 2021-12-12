<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap(){
        return view('registrar.map');
    }
    public function getMapLocationsData(){
        $locations = \DB::select("select hf.facility_name,l.latitude,l.longitude from health_facility hf left join location l on hf.location_id = l.id");
        return response()->json([
            'success'=>true,
            'locations'=>$locations
        ]);
    }
}
