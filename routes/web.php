<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HistoryHealthFacility;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\RegistrarController;
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
    Route::get('index', [AdminController::class, 'index']);

    Route::get('create_health_facility', [HistoryHealthFacility::class, 'HealthFacilityCreate']);
    Route::post('create_health_facility_form', [HistoryHealthFacility::class, 'HealthFacilityCreateForm']);
    Route::get('show_health_facility', [HistoryHealthFacility::class, 'showHealthFacility']);
    Route::delete('delete_hospital/{id}', [HistoryHealthFacility::class, 'deleteHospital']);
    Route::get('health_facility_detail/{id}', [HistoryHealthFacility::class, 'healthFacilityDetail']);


    Route::get('by_district', [HistoryHealthFacility::class, 'byDistrict']);
    Route::get('by_level', [HistoryHealthFacility::class, 'byLevel']);

    Route::get('hospital_statistics', [HistoryHealthFacility::class, 'hospitalStatistics']);
    Route::post('hospital_statistics/import', [HistoryHealthFacility::class, 'hospitalStatisticsImported']);

    Route::get('create_users', [AdminController::class, 'usersCreate']);
    Route::post('create_users_form', [AdminController::class, 'usersCreateForm']);
    Route::get('show_users', [AdminController::class, 'showUsers']);
    Route::delete('delete_user/{id}', [AdminController::class, 'deleteUser']);

    Route::get('type_of_health_unit', [ActivityController::class, 'typeOfHealthUnit']);
    Route::post('type_of_health_unit_form', [ActivityController::class, 'typeOfHealthUnitForm']);
    Route::delete('delete_health_unit/{id}', [HistoryHealthFacility::class, 'deleteHealthUnit']);
    Route::post('health_unit_update/{id}', [HistoryHealthFacility::class, 'healthUnitDetail']);


    Route::get('service_offered', [ActivityController::class, 'serviceOffered']);
    Route::post('service_offered_form', [ActivityController::class, 'serviceOfferedForm']);
    Route::delete('delete_service_offered/{id}', [HistoryHealthFacility::class, 'deleteServiceOffered']);
    Route::get('owner_details/{id}', [HistoryHealthFacility::class, 'ownerDetail']);


    Route::get('authority_responsible', [ActivityController::class, 'authorityResponsible']);
    Route::post('authority_responsible_form', [ActivityController::class, 'authorityResponsibleForm']);
    Route::delete('delete_authority_responsible/{id}', [HistoryHealthFacility::class, 'deleteAuthorityResponsibility']);

    Route::get('owner_details/{id}', [HistoryHealthFacility::class, 'ownerDetail']);

    Route::get('staffing', [ActivityController::class, 'Staffing']);
    Route::post('staffing_form', [ActivityController::class, 'StaffingForm']);
    Route::delete('delete_staffing/{id}', [HistoryHealthFacility::class, 'deleteStaffing']);

    Route::get('owner_details/{id}', [HistoryHealthFacility::class, 'ownerDetail']);


    Route::get('premises', [ActivityController::class, 'Premises']);
    Route::post('premises_form', [ActivityController::class, 'premisesForm']);
    Route::delete('delete_premises/{id}', [HistoryHealthFacility::class, 'deletePremises']);

    Route::get('owner_details/{id}', [HistoryHealthFacility::class, 'ownerDetail']);

    Route::get('no_of_beds', [ActivityController::class, 'NoOfBedsByWard']);
    Route::post('no_of_beds_by_type_of_ward_form', [ActivityController::class, 'NoOfBedsByWardForm']);
    Route::delete('delete_no_of_beds/{id}', [HistoryHealthFacility::class, 'deleteNoOfBeds']);
    Route::get('owner_details/{id}', [HistoryHealthFacility::class, 'ownerDetail']);

});
Route::prefix('user')->middleware('user')->group(function(){
    Route::get('index', [OwnerController::class, 'index']);
    
    Route::get('app_registration', [ApplicationController::class, 'showApplicantRegistrationForm']);
    Route::post('store_applicant_registration_form', [ApplicationController::class, 'storeApplicantRegistrationForm']);

    Route::get('licenses', [LicenseController::class, 'license']);
    Route::get('license_create', [LicenseController::class, 'createLicense']);
    Route::post('license_create_form', [LicenseController::class, 'createLicenseForm']);

});
Route::prefix('inspector')->middleware('inspector')->group(function(){
    Route::get('index', [InspectorController::class, 'index']);
    Route::get('comments', [InspectorController::class, 'comments']);
    Route::post('store_comments', [InspectorController::class, 'storeComments']);
    
});

Route::prefix('registrar')->middleware('registrar')->group(function(){
    Route::get('index', [RegistrarController::class, 'index']);
    Route::get('decision', [RegistrarController::class, 'decision']);
    Route::post('store_decisions', [RegistrarController::class, 'storeDecision']);
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);
Route::get('selection', [OwnerController::class, 'selection']);
Route::get('organisation', [OwnerController::class, 'organisation']);
Route::post('organisation_form', [OwnerController::class, 'organisationForm']);

require __DIR__.'/auth.php';
