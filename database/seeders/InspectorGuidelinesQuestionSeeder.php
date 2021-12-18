<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspectorGuidelinesQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspection_guidelines')->insert([
            [
                "name" => "Applicant Qualification"
            ],
            [
                "name" => "Staffing in relation to type of health facility in question"
            ],
            [
                "name" => "Premises meet minimum number of rooms"
            ],
            [
                "name" => "Facility has the essential equipment and supplies for that type of facility"
            ],
            [
                "name" => "Consideration of the views of the appropriate local government authority"
            ],
            [
                "name" => "Infrastructure"
            ],
            [
                "name" => "Waste Disposal"
            ],
        ]);
    }
}
