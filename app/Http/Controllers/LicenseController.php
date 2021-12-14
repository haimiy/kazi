<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LicenseController extends Controller
{
    public function license(){
        $licenses = DB::select('SELECT
        l.id,l.license_no,l.starting_date,l.ending_date,
        hf.facility_name
        from license l
        left join health_facility hf on hf.id = l.health_facility_id
        left join owner_health_facility ohf on hf.id = ohf.health_facility_id
        left join users u on u.id=ohf.owner_id
        where u.id = '.auth()->user()->id);
        return view('user.license' , [
            'licenses' => $licenses,
        ]);
    }
    public function createLicense(){
        $health_facility = DB::table('health_facility')->where('user_id', Auth::id())->get();
        return view('user.create_license', compact('health_facility'));
    }

    public function createLicenseForm(Request $request){
        $license = new License();
        $license->license_no = $request->license_no;
        $license->license_type = $request->license_type;
        $license->starting_date = $request->starting_date;
        $license->owner_id = auth()->user()->id;
        $license->health_facility_id = auth()->user()->health_facility->id;
    }
}
