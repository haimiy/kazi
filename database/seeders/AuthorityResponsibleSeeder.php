<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorityResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authority_responsible')->insert([
            [
                "name" => "Parastatal"
            ],
            [
                "name" => "Voluntary"
            ],
            [
                "name" => "Agency"
            ],
            [
                "name" => "Private"
            ],
            [
                "name" => "Other (specify)"
            ]
        ]);
    }
}
