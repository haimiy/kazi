<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LicenseController extends Controller
{
    public function license(){
        $licenses = DB::select('SELECT
        l.id,l.license_no,l.starting_date,l.ending_date,
        hf.facility_name,
        o.person_incharge
        from license l
        left join health_facility hf on hf.id = l.health_facility_id
        left join owner_health_facility ohf on hf.id = ohf.health_facility_id
        left join owner o on o.id = ohf.owner_id
        left join users u on u.id = o.person_incharge
        where u.id = '.auth()->user()->id);
        return view('user.license' , [
            'licenses' => $licenses,
        ]);  
    }

    public function licenseRenew($id){
       $licenses = DB::select('SELECT
        l.id,l.license_no,l.starting_date,l.ending_date,
        hf.facility_name,
        o.person_incharge
        from license l
        left join health_facility hf on hf.id = l.health_facility_id
        left join owner_health_facility ohf on hf.id = ohf.health_facility_id
        left join owner o on o.id = ohf.owner_id
        left join users u on u.id = o.person_incharge
        where u.id = '.auth()->user()->id);
        return view('user.license_renew', [
            'licenses' => $licenses[0],
        ]);
    }

    public function updateRenewLicense(Request $request){
        $query = DB::table('license')->where('id', $request['licenseId'])->update([
                    'license_type' => 'renew',
                    'starting_date' =>$request->starting_date,
                    'ending_date' => date('Y-m-d', strtotime($request->starting_date.' + 1 years'))
                ]);

                if ($query) {
                Session::flash('success', 'License renew Successfull!');
                return redirect('/user/licenses');        
                }else{
                Session::flash('fail', 'License Not Renewed');
                return redirect('/user/licenses');
                }
    }
}
