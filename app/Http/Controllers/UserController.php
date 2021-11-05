<?php

namespace App\Http\Controllers;

use App\Models\AuthorityResponsible;
use App\Models\District;
use App\Models\Role;
use App\Models\User;
use App\Models\Owner;
use App\Models\Staffing;
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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    //Owner
    public function ownerIndex()
    {   $roles = Role::all();
        $user = DB::select('select * from users where users.role_id = '. 4);
        return view('admin.owner', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
    public function ownerCreate()
    {   $roles = Role::all();
        return view('admin.owner_create',[
            'roles' => $roles,
        ]);
    }
    public function owner_store(Request $request)
    {
       $validate = $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        $user=User::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }
    public function ownerUpdate(Request $request, $id)
    {   $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);
        $user_id = User::where('id', $id)->update([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        'address' => $request->address,
        ]);
        Session::flash('message', 'Data Updated Successfull!');
        return redirect()->back();
    }

    public function ownerDelete($id)
    {
        $user_id = User::find($id);
        $user_id->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }
    public function ownerDetail($id){
        $user_id = User::find($id);
        return view('admin.owner_details', [
            'user_id'=>$user_id
        ]);
    }


    public function staffingIndex()
    {
        $user = DB::select('SELECT u.*, s.license_job, s.status_categories, s.staffing_no, s.temporary_permanent FROM users u 
        LEFT JOIN staffing s ON s.user_id = u.id WHERE u.role_id = '. 3);
        return view('admin.staffing', [
            'user' => $user,
        ]);
    }

    public function Staffing_create()
    {
        return view('admin.staffing_create');
    } 
    public function Staffing_store(Request $request)
    {   
        $validate = $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'license_job' => 'required',
            'status_categories' => 'required',
            'staffing_no' => 'required',
            'temporary_permanent' => 'required',
        ]);
        
        $user = User::create($request->all());
        $request['user_id'] = $user->id;  
        
        Staffing::create($request->all());   
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function staffingUpdate(Request $request, $id){
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'license_job' => 'required',
            'status_categories' => 'required',
            'staffing_no' => 'required',
            'temporary_permanent' => 'required',
        ]);
            User::where('id', $id)->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
        ]);
            
            Staffing::where('id', $id)->update([
            'user_id' => $request->id,
            'license_job' => $request->license_job,
            'status_categories' => $request->status_categories,
            'staffing_no' => $request->staffing_no,
            'temporary_permanent' => $request->temporary_permanent,
        ]);
            Session::flash('message', 'Data Updated Successfull!');
            return redirect()->back();
    }

    public function Doctor_incharge()
    {
        $user = DB::select('SELECT u.*, d.qualification FROM users u 
        LEFT JOIN doctor_incharge d ON d.user_id = u.id WHERE u.role_id = '. 5);
        return view('admin.doctor_incharge', [
            'user' => $user
        ]);
    }
    public function Doctor_incharge_create()
    {
        return view('admin.doctor_incharge_create');
    }
    public function doctorInchargeStore(Request $request)
    { 
        $validate = $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            
        ]);
        
        $user = User::create($request->all());
        $request['user_id'] = $user->id;  
        DoctorIncharge::create($request->all());   
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }
    public function doctorInchargeUpdate(Request $request, $id){
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            
        ]);
            User::where('id', $id)->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
        ]);
            
            DoctorIncharge::where('id', $id)->update([
            'qualification' => $request->qualification,
        ]);
            Session::flash('message', 'Data Updated Successfull!');
            return redirect()->back();
    }
    
    public function create()
    {
        //
    }
    public function UsersCreate()
    {
        $roles = Role::all();
        return view('admin.user_create', [
            'roles'=>$roles,
        ]);
    }

    public function UsersCreateForm(Request $request){
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

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function applicantRegistration(){
        $type_of_health_units = TypeOfHealthUnit::all();
        $authority_responsibles = AuthorityResponsible::all();
        $districts = District::all();
        $services = TypeOfService::all();
        $staffs = Occupation::all();
        $premises = PremisesType::all();
        $by_wards = TypeOfWard::all();
        return view('user.registration', [
            'type_of_health_units' => $type_of_health_units,
            'authority_responsibles' => $authority_responsibles,
            'districts' => $districts,
            'services' => $services,
        ]);
    }

    public function applicantRegistrationForm(Request $request){
        $application_form = new  Registration();
        $application_form->type_of_health_unit_id = $request->type_of_health_unit_id;
        $application_form->type_of_health_unit_specified = $request->type_of_health_unit_specified;
        $application_form->authority_responsible_id = $request->authority_responsible_id;
        $application_form->authority_responsible_specified = $request->authority_responsible_specified;
        $application_form->starting_operation_date = $request->starting_operation_date;
    
        $application_form->nearest_hospital_name = $request->nearest_hospital_name;
        $application_form->nearest_hospital_owner = $request->nearest_hospital_owner;
        $application_form->nearest_hospital_distance = $request->nearest_hospital_distance;
        $application_form->nearest_hospital_type_of_health_unit = $request->nearest_hospital_type_of_health_unit;
    
        $application_form->service_type_id = $request->service_type_id;
        $application_form->have_additional_requirement = $request->have_additional_requirement;
        $application_form->additional_requirement = $request->additional_requirement;
    
        $application_form->user_id = auth()->user()->id ;
    
        $application_form->save();
        
        $doctor_incharge = new DoctorIncharge();
        $doctor_incharge->full_name = $request->full_name;
        $doctor_incharge->qualification = $request->qualification;
        $doctor_incharge->user_id = auth()->user()->id ;
        $doctor_incharge->save();

        $health_facility = new HealthFacility();
        $health_facility->facility_name = $request->facility_name;
        $health_facility->reg_no = $request->reg_no;
        $health_facility->user_id = auth()->user()->id ;
        $health_facility->save();

        $owner = new Owner();
        $owner->person_incharge = auth()->user()->id;
        $owner->save();

        $location = Location::create($request->all());
        $location->user_id = auth()->user()->id;
        $location->save();

        Session::flash('success_message', 'Data Inserted Successfull!');
        return redirect()->back();
    }

        public function Selection(){
            return view('selection');
        }
        public function Organisation(){
            $type =  ['Partnership', 'Corporation', 'Limited liability Company'];
            return view('auth.organisation', compact('type'));
        }
        public function OrganisationForm(Request $request){
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

            $organisation = Organisation::create($request->all());
            $organisation->owner_id = $user->id;
            $organisation->save();
    
            $owner = new Owner();
            $owner->person_incharge = $user->id;
            $owner->save();
            Session::flash('success_message', 'Data Inserted Successfull!');
            return redirect('/');
        }

}
