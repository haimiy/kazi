<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_services')->insert([
            [
                "name_of_services" => "General outpatient services"
            ],
            [
                "name_of_services" => "Maternal and Child health service"
            ],
            [
                "name_of_services" => "Laboratory"
            ],
            [
                "name_of_services" => "Dental"
            ],
            [
                "name_of_services" => "Observation services"
            ],
            [
                "name_of_services" => "Inpatient services"
            ],
            [
                "name_of_services" => "Maternity services"
            ],
            [
                "name_of_services" => "Minor surgeries"
            ],
            [
                "name_of_services" => "Major surgeries"
            ],
            [
                "name_of_services" => "X-ray"
            ],
            [
                "name_of_services" => "Ultrasound"
            ],
            [
                "name_of_services" => "Home visiting"
            ],
            [
                "name_of_services" => "Specialist Clinics"
            ],
            [
                "name_of_services" => "Medical"
            ],
            [
                "name_of_services" => "Pediatrics"
            ],
            [
                "name_of_services" => "Surgical-General"
            ],
            [
                "name_of_services" => "Orthopedics"
            ],
            [
                "name_of_services" => "Obstetrics/Gynecology"
            ],
            [
                "name_of_services" => "Ophthalmology"
            ],
            [
                "name_of_services" => "Ear, Nose and Throat "
            ],
            [
                "name_of_services" => "Poly Clinics"
            ],
            [
                "name_of_services" => "Other (Specify)."
            ],
        ]);
    }
}
