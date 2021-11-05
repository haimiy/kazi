<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('building_parts')->insert([
            [
                'name'=> 'Paint'
            ],
            [
                'name'=> 'Ceiling'
            ],
            [
                'name'=> 'Doors and window'
            ],
            [
                'name'=> 'Space in each room'
            ],
        ]);
        DB::table('building_parts_state')->insert([
            [
                'name'=>'Good',
                'building_part_id'=>1,
            ],
            [
                'name'=>'Average',
                'building_part_id'=>1,
            ],
            [
                'name'=>'Bad',
                'building_part_id'=>1,
            ],
            [
                'name'=>'Good',
                'building_part_id'=>2,
            ],
            [
                'name'=>'Falling or leaky',
                'building_part_id'=>2,
            ],
            [
                'name'=>'intact',
                'building_part_id'=>3,
            ],
            [
                'name'=>'broken',
                'building_part_id'=>3,
            ],
            [
                'name'=>'adequate',
                'building_part_id'=>4,
            ],
            [
                'name'=>'inadequate',
                'building_part_id'=>4,
            ],
        ]);


    }
}
