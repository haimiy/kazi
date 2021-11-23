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

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
     public function usersCreate()
    {
        $roles = Role::all();
        return view('admin.user_create', [
            'roles'=>$roles,
        ]);
    }

    public function usersCreateForm(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'role_id' => 'required',

        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'role_id' => $request->role_id,
            'password' => Hash::make('1234'),
        ]);
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }
    public function showUsers(){
        $users = DB::select('SELECT users.*,roles.role_name FROM users  INNER JOIN roles
        ON  users.role_id = roles.id ORDER by users.first_name ');
        return view('admin.users_show', [
            'users' => $users,
        ]);
    }

    public function deleteUser($id){
        $user_id = User::find($id);
        $user_id->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }

}
