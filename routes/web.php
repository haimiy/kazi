<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HistoryHealthFacility;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

 
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('index', function () {
        return view('admin.index');
    });
    Route::get('create_health_facility', [HistoryHealthFacility::class, 'HealthFacilityCreate']);
    Route::post('create_health_facility_form', [HistoryHealthFacility::class, 'HealthFacilityCreateForm']);
    Route::get('show_health_facility', [HistoryHealthFacility::class, 'showHealthFacility']);

    Route::get('hospital_statistics', [HistoryHealthFacility::class, 'hospitalStatistics']);
    Route::post('hospital_statistics/import', [HistoryHealthFacility::class, 'hospitalStatisticsImported']);

    Route::get('create_users', [UserController::class, 'UsersCreate']);
    Route::post('create_users_form', [UserController::class, 'UsersCreateForm']);
    Route::get('show_users', [UserController::class, 'showUsers']);
    Route::delete('delete_user/{id}', [UserController::class, 'deleteUser']);

    Route::get('type_of_health_unit', [ActivityController::class, 'typeOfHealthUnit']);
    Route::post('type_of_health_unit_form', [ActivityController::class, 'typeOfHealthUnitForm']);

    Route::get('service_offered', [ActivityController::class, 'serviceOffered']);
    Route::post('service_offered_form', [ActivityController::class, 'serviceOfferedForm']);

    Route::get('authority_responsible', [ActivityController::class, 'authorityResponsible']);
    Route::post('authority_responsible_form', [ActivityController::class, 'authorityResponsibleForm']);

    Route::get('staffing', [ActivityController::class, 'Staffing']);
    Route::post('staffing_form', [ActivityController::class, 'StaffingForm']);

    Route::get('premises', [ActivityController::class, 'Premises']);
    Route::post('premises_form', [ActivityController::class, 'premisesForm']);

    Route::get('no_of_beds', [ActivityController::class, 'NoOfBedsByWard']);
    Route::post('no_of_beds_by_type_of_ward_form', [ActivityController::class, 'NoOfBedsByWardForm']);
  
});
Route::prefix('user')->middleware('user')->group(function(){
    Route::get('index', function () {
        return view('user.index');
    });
    Route::get('general_facility_info', [UserController::class, 'generalFacilityInfo']);
    Route::post('general_facility_info_form', [UserController::class, 'generalFacilityInfoForm']);
    Route::get('services_offered', [UserController::class, 'servicesOffered']);
    Route::post('services_offered_form', [UserController::class, 'servicesOfferedForm']);
    Route::get('location', [UserController::class, 'location']);
    Route::post('location_form', [UserController::class, 'locationForm']);
    Route::get('nearest', [UserController::class, 'nearest']);
    Route::get('other', [UserController::class, 'other']);
});


Route::get('general_list', [HospitalController::class, 'generalList']);
Route::post('owner_create_store', [UserController::class, 'owner_store']);
Route::post('owner_create_store', [UserController::class, 'owner_store']);
Route::post('owner_update/{id}', [UserController::class, 'ownerUpdate']);
Route::delete('delete/{id}', [UserController::class, 'ownerDelete']);
Route::get('owner_details/{id}', [UserController::class, 'ownerDetail']);

Route::get('level', [HospitalController::class, 'Level']);
Route::post('level_create_store', [HospitalController::class, 'level_store']);
Route::get('level/index', [HospitalController::class, 'levelIndex']);
Route::post('level_update/{id}', [HospitalController::class, 'levelUpdate']);
Route::delete('delete/{id}', [HospitalController::class, 'levelDelete']);
Route::get('level_details/{id}', [HospitalController::class, 'levelDetail']);


Route::get('By_district', [HospitalController::class, 'byDistrict']);
Route::post('By_district_create_store', [HospitalController::class, 'by_district_store']);
Route::get('By_district/index', [HospitalController::class, 'BydistrictIndex']);
Route::post('by_district_update/{id}', [HospitalController::class, 'byDistrictUpdate']);
Route::delete('delete/{id}', [HospitalController::class, 'byDistrictDelete']);
Route::get('By_district_details/{id}', [HospitalController::class, 'byDistrictDetail']);


Route::get('owner_create', [UserController::class, 'ownerCreate']);
Route::post('owner_create_store', [UserController::class, 'owner_store']);
Route::get('owner/index', [UserController::class, 'ownerIndex']);
Route::post('owner_update/{id}', [UserController::class, 'ownerUpdate']);
Route::delete('delete/{id}', [UserController::class, 'ownerDelete']);
Route::get('owner_details/{id}', [UserController::class, 'ownerDetail']);

Route::get('doctor_incharge_create', [UserController::class, 'Doctor_incharge_create']);
Route::post('doctor_incharge_store', [UserController::class, 'doctorInchargeStore']);
Route::get('doctor_incharge', [UserController::class, 'Doctor_incharge']);
Route::post('doctor_incharge_update/{id}',[UserController::class,'doctorInchargeUpdate']);

Route::get('staffing_create', [UserController::class, 'Staffing_create']);
Route::post('staffing_create_store', [UserController::class, 'staffing_store']);
Route::get('staffing/index', [UserController::class, 'staffingIndex']);
Route::post('staffing_update/{id}', [UserController::class, 'staffingUpdate']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);

require __DIR__.'/auth.php';