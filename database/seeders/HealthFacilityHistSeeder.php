<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthFacilityHistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history_health_facility')->insert([
            [
                "facility_name" => "Changongo Clinic",
                "reg_no" => "31",
                "district_name" => "Urban District",
                "type_of_health_unit" => "Clinics",
                "starting_operation_date" => "2021-10-12",
                "full_name" => "Dr. Shamis A. Khamis",
                "phone_no" => "0779 624100",
                "location" => "Muembechugu",
                "service_name" => "Dental Services",
                "doctor_incharge_name" => " ",
                "qualification" => " ",
            ],
          
        ]);
    }
}
