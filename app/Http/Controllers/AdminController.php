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
use App\Models\Inspector;
use App\Models\Registrar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $registrars = User::where('role_id',3)->count();
        $inspectors = User::where('role_id',4)->count();
        $owners = User::where('role_id',5)->count();
        return view('admin.index', [
            'users' => $users,
            'registrars' => $registrars,
            'inspectors' => $inspectors,
            'owners' => $owners,
        ]);
    }
     public function inspectorCreate()
    {
        $roles = Role::all();
        return view('admin.inspector_create', [
            'roles'=>$roles,
        ]);
    }
     public function registrarCreate()
    {
        $roles = Role::all();
        return view('admin.registrar_create', [
            'roles'=>$roles,
        ]);
    }
    public function storeInspector(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'role_id' => 4,
            'password' => Hash::make('1234'),
        ]);
        $inspector = Inspector::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'inspector_type' => $request->inspector_type,
        ]);
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }
    public function storeRegistrar(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',

        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'role_id' => 3,
            'password' => Hash::make('1234'),
        ]);
        Registrar::create([
            'user_id' => $user->id,
            'title' => $request->title,
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

    public function AjaxdeleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['status'=>true, 'message'=>'User Deleted Successful!']);
    }
    public function editUser($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('registrar.edit_user', [
            'user'  => $user
        ]);

    }

    public function editUserInformation($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('admin.edit_user', [
            'user'  => $user,
        ]);
    }
    public function UpdateUserInformation(Request $request){
                 $query = DB::table('users')->where('id', $request['userId'])->update([
                    'first_name' =>$request->first_name,
                    'middle_name' =>$request->middle_name,
                    'last_name' =>$request->last_name,
                    'email' =>$request->email,
                    'phone_no' =>$request->phone_no,
                    'address' =>$request->address,
                ]);
                if ($query) {
                Session::flash('success', 'Data Successfull! Updated');
                return redirect()->back();        
                }else{
                Session::flash('fail', 'Data Not Updated');
                return redirect()->back();
                }
    }

    public function updateUser(Request $request){
        $updated = DB::table('users')->where('id', $request['userId'])->update([
            'first_name' =>$request->first_name,
            'middle_name' =>$request->middle_name,
            'last_name' =>$request->last_name,
            'email' =>$request->email,
            'phone_no' =>$request->phone_no,
            'address' =>$request->address,
            'password'=>Hash::make('0000'),
        ]);
        if ($updated) {
        Session::flash('success', 'Data Successfull! Updated');
        return redirect()->back();        
        }else{
        Session::flash('fail', 'Data Not Updated');
        return redirect()->back();
        }
        
    }

}
