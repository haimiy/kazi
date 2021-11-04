<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\TypeOfService;
use App\Models\TypeOfHealthUnit;
use App\Models\HospitalStatistics;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Imports\HospitalStatisticsImport;
use App\Models\AuthorityResponsible;
use App\Models\HistoryHealthFacility as ModelsHistoryHealthFacility;
use App\Models\Occupation;
use App\Models\PremisesType;
use App\Models\TypeOfWard;

class HistoryHealthFacility extends Controller
{
    public function HealthFacilityCreate()
    {
        $district = District::all();
        $type_of_health_unit = TypeOfHealthUnit::all(); 
        $service = TypeOfService::all();
        return view('admin.create', [
            'district' => $district,
            'type_of_health_unit' => $type_of_health_unit,
            'service' => $service,
        ]);
       
    }
    public function HealthFacilityCreateForm(Request $request)
    {
        ModelsHistoryHealthFacility::create($request->all());
        Session::flash('success_message', 'Data Inserted Successfull!');
        return redirect()->back();
    }

    public function showHealthFacility(){
        $health_facility = ModelsHistoryHealthFacility::all();
        return view('admin.show_history_health_facility', [
            'health_facility' => $health_facility,
        ]);
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
        return back()->with('success', 'Data imported successfully');
    }
    public function byDistrict(){
        $health_facility = ModelsHistoryHealthFacility::all();
        return view('admin.by_district', [
            'health_facility' => $health_facility
        ]);
    }

    public function byLevel(){
        $health_facility = ModelsHistoryHealthFacility::all();
        return view('admin.level', [
            'health_facility' => $health_facility
        ]);
    }
    public function deleteHospital($id){
        $hospital_id =ModelsHistoryHealthFacility::find($id);
        $hospital_id->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();

    } 
    public function deleteHealthUnit($id){
        TypeOfHealthUnit::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }

    public function healthUnitDetail(Request $request, $id)
    {  
        $type_of_health_unit = TypeOfHealthUnit::where('id', $id)->update([
        'name' => $request->name,
        ]);
        Session::flash('message', 'Data Updated Successfull!');
        return redirect()->back();
    }

    public function deleteAuthorityResponsibility($id){
        AuthorityResponsible::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }
    
    public function deleteServiceOffered($id){
        TypeOfService::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }
   
    public function deletePremises($id){
        PremisesType::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }

    public function deleteNoOfBeds($id){
        TypeOfWard::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }
   
    public function deleteStaffing($id){
        Occupation::find($id)->delete();
        Session::flash('delete_message', 'Deleted Successfull!');
        return redirect()->back();
    }
   

      
}

