<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfWardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_ward')->insert([
            [
                "name" => "Male General(Medical & Surgical)"
            ],
            [
                "name" => "Female General(Medical &
                Surgical)"
            ],
            [
                "name" => "Male Medical"
            ],
            [
                "name" => "Female Medical"
            ],
            [
                "name" => "Delivery"
            ],
            [
                "name" => "Pediatrics"
            ],
            [
                "name" => "Intensive care"
            ],
        ]);

        $typeOfWard =  [
            "name" => "Other (Specify).",
            "is_specified"=>true
        ];
        DB::table('type_of_ward')->insert($typeOfWard);
    }
}
