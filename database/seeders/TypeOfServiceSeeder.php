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
                "name_of_services" => "General outpatient services",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Maternal and Child health service",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Laboratory",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Dental",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Observation services",
                "have_additional_requirement" => true,
                "additional_requirement" => "no of beds"
            ],
            [
                "name_of_services" => "Inpatient services",
                "have_additional_requirement" => true,
                "additional_requirement" => "no of beds"
            ],
            [
                "name_of_services" => "Maternity services",
                "have_additional_requirement" => true,
                "additional_requirement" => "no of beds"
            ],
            [
                "name_of_services" => "Minor surgeries",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Major surgeries",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "X-ray",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Ultrasound",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Home visiting",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Specialist Clinics",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Medical",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Pediatrics",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Surgical-General",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Orthopedics",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Obstetrics/Gynecology",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Ophthalmology",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Ear, Nose and Throat ",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
            [
                "name_of_services" => "Poly Clinics",
                "have_additional_requirement" => false,
                "additional_requirement" => ""
            ],
        ]);

        $typeOfService = [
            "name_of_services" => "Other (Specify).",
            "is_specified"=>true
        ];
        DB::table('type_of_services')->insert($typeOfService);
    }
}
