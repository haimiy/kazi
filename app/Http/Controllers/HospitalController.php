<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Level;
use App\Models\District;
use App\Models\Staffing;
use App\Models\By_district;
use App\Models\GeneralList;
use App\Models\HealthCentre;
use Illuminate\Http\Request;
use App\Models\DoctorIncharge;
use App\Models\ServiceDelivary;
use App\imports\GeneralListImport;
use App\Models\HospitalStatistics;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HealthCentreCategories;
use Illuminate\Support\Facades\Session;
use App\Exports\hospitalStatisticsExport;
use App\Imports\HospitalStatisticsImport;

class HospitalController extends Controller
{
    public function index()
    {
        $doctor_incharge = DB::select('select * from users where users.role_id = '. 5);
        $health_centre_categories = HealthCentreCategories::all();
        $service_delivary = ServiceDelivary::all();
        $district = District::all();
        $owner = DB::select('select * from users where users.role_id = '. 4);
        $staffing = DB::select('SELECT u.*, s.license_job, s.status_categories, s.staffing_no, s.temporary_permanent FROM users u 
        LEFT JOIN staffing s ON s.user_id = u.id WHERE u.role_id = '. 3);
        
        return view('admin.create', [
            'health_centre_categories' => $health_centre_categories,
            'district' => $district,
            'owner' => $owner,
            'staffing' => $staffing,
            'doctor_incharge' => $doctor_incharge,
            'service_delivary' => $service_delivary,
        ]);
       
    }

    public function generalList(){
        $hospital = HealthCentre::all();
        return view('admin.general_list', [
            'hospitals' => $hospital,
        ]);
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
       
  
    public function Level(){
        $hospital = HealthCentre::all();
        return view('admin.Level', [
            'hospitals' => $hospital,
        ]);
    }
  
    public function byDistrict(){
        $hospital = HealthCentre::all();
        return view('admin.By_district', [
            'hospitals' => $hospital,
        ]);
    }
    
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required',
            'health_centre_categories_id' => 'required',
            'district_id' => 'required',
            'owner_id' => 'required',
            'reg_no' => 'required',
            'year' => 'required',
            'staffing_id' => 'required',
            'licence_no' => 'required',
            'doctor_incharge_id' => 'required',
            'inspection_date' => 'required',
            'license_reg_date' => 'required',
            'service_delivary_id' => 'required',
            'location' => 'required',
            'phone_no' => 'required',
            'status' => 'required',
        ]);
        $hospital = HealthCentre::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
       
    }

   
    public function destroy($id)
    {
        
    }

    public function hospitalStatistics(){
        $hospital_statistics = HospitalStatistics::all();
        return view('admin.hospital_statistics',[
            'hospital_statistics'=> $hospital_statistics,
        ]);
    }

    public function hospitalStatisticsImported(Request $request) 
    {
        Excel::import(new HospitalStatisticsImport, $request->file('file')->store('temp'));
        return back();
    }
    public function hospitalStatisticsExported() 
    {
        return Excel::download(new hospitalStatisticsExport, 'hospital_statistics.xlsx');
    }

    public function import(Request $request) 
    {
        Excel::import(new GeneralListImport, $request->file('file')->store('temp'));
        return back();
    }
}
