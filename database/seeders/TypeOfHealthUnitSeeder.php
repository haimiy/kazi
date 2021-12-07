<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfHealthUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_health_unit')->insert([
            [
                "name" => "Medical Clinic",
                "prefix" => "PHAB/0001"
            ],
            [
                "name" => "Mobile Clinic",
                "prefix" => "PHAB/0002"
            ],
            [
                "name" => "Stand Alone Clinic (Ent, Physiotherapy, Optometric)",
                "prefix" => "PHAB/0003"
            ],
            [
                "name" => "Dental clinic",
                "prefix" => "PHAB/0004"
            ],
            [
                "name" => "Nursing Home",
                "prefix" => "PHAB/0005"
            ],
            [
                "name" => "Maternity Home",
                "prefix" => "PHAB/0006"
            ],
            [
                "name" => "Super Specialized Clinics",
                "prefix" => "PHAB/0007"
            ],
            [
                "name" => "PolyClinics",
                "prefix" => "PHAB/0008"
            ],
            [
                "name" => "Diagnostic centre",
                "prefix" => "PHAB/0009"
            ],
            [
                "name" => "Private Laboratory",
                "prefix" => "PHAB/0010"
            ],
            [
                "name" => "Dispensary (GENERAL & LAB)",
                "prefix" => "PHAB/0011"
            ],
            [
                "name" => "Dispensary (GENERAL, LAB, RICH SERVICES & DENTAL)",
                "prefix" => "PHAB/0012"
            ],
            [
                "name" => "Health Center",
                "prefix" => "PHAB/0013"
            ],
            [
                "name" => "District Hospital",
                "prefix" => "PHAB/0014"
            ],
            [
                "name" => "Regional Hospital",
                "prefix" => "PHAB/0015"
            ],
            [
                "name" => "Refferal Hospital",
                "prefix" => "PHAB/0016"
            ],
            [
                "name" => "Other (Specify).",
                "prefix" => "PHAB/0017"
            ]
        ]);
    }
}
