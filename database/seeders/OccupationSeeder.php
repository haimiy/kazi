<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupation')->insert([
            [
                "name" => "Specialists Medical Officers"
            ],
            [
                "name" => "Surgical-general"
            ],
            [
                "name" => "Anesthesia"
            ],
            [
                "name" => "Hematology"
            ],
            [
                "name" => "Microbiology"
            ],
            [
                "name" => "IPathology"
            ],
            [
                "name" => "Public Health"
            ],
            [
                "name" => "General practitioner(MO)"
            ],
            [
                "name" => "Medical officer"
            ],
            [
                "name" => "Clinical officer(Medical Assistant)"
            ],
            [
                "name" => "Dentist(DDS)"
            ],
            [
                "name" => "Assistant Dental officer (ADO)"
            ],
            [
                "name" => "Dental therapist(DT)"
            ],
            [
                "name" => "Medical"
            ],
            [
                "name" => "Pediatrics"
            ],
            [
                "name" => "Psychiatry"
            ],
            [
                "name" => "Orthopedics"
            ],
            [
                "name" => "Obstetrics/Gynecology"
            ],
            [
                "name" => "Ophthalmology"
            ],
            [
                "name" => "Ear, Nose and Throat "
            ],
            [
                "name" => "Radiology"
            ],
            [
                "name" => "Register Nurse"
            ],
            [
                "name" => "Nurse Officer"
            ],
            [
                "name" => "Nurse Specialist"
            ],
            [
                "name" => "Midwife Specialist"
            ],
            [
                "name" => "Pharmacist"
            ],
            [
                "name" => "Pharmaceutical Technician"
            ],
            [
                "name" => "Laboratory Technician"
            ],
            [
                "name" => "Radiographer"
            ],
            [
                "name" => "Radiog. Assistants"
            ],
            [
                "name" => "Other specialists (specify)"
            ],
        ]);
    }
}
