<?php

namespace App\Http\Controllers;

use App\Models\Staffing;
use App\Models\Occupation;
use Illuminate\Http\Request;
use App\Models\TypeOfService;
use App\Models\NoOfBedsByWard;
use App\Models\TypeOfHealthUnit;
use App\Models\AuthorityResponsible;
use App\Models\Premises;
use App\Models\PremisesType;
use App\Models\TypeOfWard;
use Illuminate\Support\Facades\Session;

class ActivityController extends Controller
{
    public function typeOfHealthUnit(){
        $type_of_health_unit = TypeOfHealthUnit::all();
        return view('admin.activity.type_of_health_unit', [
            'type_of_health_unit' => $type_of_health_unit,
        ]);
    }
    public function typeOfHealthUnitForm(Request $request){
        TypeOfHealthUnit::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function authorityResponsible(){
        $authority_responsible = AuthorityResponsible::all();
        return view('admin.activity.authority_responsible', [
            'authority_responsible' => $authority_responsible,
        ]);
    }

     public function authorityResponsibleForm(Request $request){
        AuthorityResponsible::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function serviceOffered(){
        $service_offered = TypeOfService::all();
        return view('admin.activity.service_offered', [
            'service_offered' => $service_offered,
        ]);
    }
    public function serviceOfferedForm(Request $request){
        TypeOfService::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function Staffing(){
        $staffing = Occupation::all();
        return view('admin.activity.staffing', [
            'staffing' => $staffing,
        ]);
    }
    public function StaffingForm(Request $request){
        Occupation::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function NoOfBedsByWard(){
        $no_of_beds_by_type_of_ward = TypeOfWard::all();
        return view('admin.activity.no_of_beds_by_type_of_ward', [
            'no_of_beds_by_type_of_ward' => $no_of_beds_by_type_of_ward,
        ]);
    }
    public function NoOfBedsByWardForm(Request $request){
        TypeOfWard::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }

    public function Premises(){
        $premises = PremisesType::all();
        return view('admin.activity.premises', [
            'premises' => $premises,
        ]);
    }
    public function premisesForm(Request $request){
        PremisesType::create($request->all());
        Session::flash('message', 'Data inserted Successfull!');
        return redirect()->back();
    }
}