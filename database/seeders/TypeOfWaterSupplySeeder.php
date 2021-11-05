<?php

namespace Database\Seeders;

use App\Models\TypeOfWaterSupply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfWaterSupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_water_supply')->insert([
            ['name'=>'None'],
            ['name'=>'Piped'],
            ['name'=>'Well'],
            ['name'=>'Rain water tank'],
            ['name'=>'Stream'],
        ]);
    }
}
