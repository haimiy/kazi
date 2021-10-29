<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\TypeOfService;
use App\Models\TypeOfHealthUnit;
use App\Models\HospitalStatistics;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HospitalStatisticsImport;
use Illuminate\Support\Facades\Session;
use App\Models\HistoryHealthFacility as ModelsHistoryHealthFacility;

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
        return back();
    }
}
