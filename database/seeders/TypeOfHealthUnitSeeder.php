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
                "name" => "Medical Clinic"
            ],
            [
                "name" => "Dental clinic"
            ],
            [
                "name" => "Nursing Home"
            ],
            [
                "name" => "Maternity Home"
            ],
            [
                "name" => "Dispensary"
            ],
            [
                "name" => "Health Center"
            ],
            [
                "name" => "Hospital"
            ],
            [
                "name" => "Other (Specify)."
            ]
        ]);
    }
}
