<?php

namespace App\Http\Controllers;

use App\Models\AuthorityResponsible;
use App\Models\BuildingPart;
use App\Models\District;
use App\Models\Role;
use App\Models\TypeOfWaterSupply;
use App\Models\User;
use App\Models\Owner;
use App\Models\Staffing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

class OwnerController extends Controller

{
        public function index(){
        return view('user.index');
        }
        public function selection(){
            return view('selection');
        }
        public function organisation(){
            $type =  ['Partnership', 'Corporation', 'Limited liability Company'];
            return view('auth.organisation', compact('type'));
        }
        public function organisationForm(Request $request){

            $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
                'role_id' => 5,
                'password' => Hash::make($request->password),
            ]);

            $owner = new Owner();
            $owner->person_incharge = $user->id;
            $owner->designation = $request->designation;
            $owner->ownership_type = "Company";
            $owner->save();

            $organisation = Organisation::create($request->all());
            $organisation->owner_id = $owner->id;
            $organisation->save();


            Session::flash('success_message', 'Data Inserted Successfull!');
            return redirect('/');
        }

}
