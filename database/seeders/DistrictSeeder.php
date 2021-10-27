<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('district')->insert([
            [
                "name" => "Urban District"
            ],
            [
                "name" => "West Disctrict 'A' "
            ],
            [
                "name" => "West District 'B' "
            ],
            [
                "name" => "Central Disptrict"
            ],
            [
                "name" => "South District"
            ],
            [
                "name" => "North A "
            ],
            [
                "name" => "North B "
            ],
            [
                "name" => "North Pemba "
            ],
            [
                "name" => "South Pemba  (Chake Chake)"
            ],
        ]);
    }
}
