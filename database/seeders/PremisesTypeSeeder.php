<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremisesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premises_type')->insert([
            [
                "name" => "Reception"
            ],
            [
                "name" => "Office of officer in-charge"
            ],
            [
                "name" => "Consultation room"
            ],
            [
                "name" => "Laboratory reception"
            ],
            [
                "name" => "Laboratory working room"
            ],
            [
                "name" => "Blood Bank"
            ],
            [
                "name" => "Male Nurses changing room"
            ],
            [
                "name" => "Female doctors changing room"
            ],
            [
                "name" => "Injection room"
            ],
            [
                "name" => "Dispensing"
            ],
            [
                "name" => "Observation room"
            ],
            [
                "name" => "Store"
            ],
            [
                "name" => "MCH rooms"
            ],
            [
                "name" => "Minor Theatre"
            ],
            [
                "name" => "Major Operating room"
            ],
            [
                "name" => "Laundry"
            ],
            [
                "name" => "Mortuary"
            ],
            [
                "name" => "Library"
            ],
            [
                "name" => "Seminars/Conference room"
            ],
            [
                "name" => "Kitchen"
            ],
            [
                "name" => "Toilet facilities"
            ],
            [
                "name" => "Washing slab"
            ],
            [
                "name" => "Incinerator"
            ],
            [
                "name" => "Records"
            ],
            [
                "name" => "Other (Specify)."
            ]
        ]);
    }
}
