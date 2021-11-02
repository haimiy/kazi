<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospital_statistic')->insert([
            [
                "starting_year" => "1994",
                "health_facility" => 0,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "1995",
                "health_facility" => 0,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "1996",
                "health_facility" => 11,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "1997",
                "health_facility" => 6,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "1998",
                "health_facility" => 4,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "1999",
                "health_facility" => 6,
                "hospital_no" => 1,
            ],
            [
                "starting_year" => "2000",
                "health_facility" => 4,
                "hospital_no" => 1,
            ],
            [
                "starting_year" => "2001",
                "health_facility" => 6,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2002",
                "health_facility" => 4,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2003",
                "health_facility" => 6,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2004",
                "health_facility" => 5,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2005",
                "health_facility" => 2,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2006",
                "health_facility" => 2,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2007",
                "health_facility" => 2,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2008",
                "health_facility" => 1,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2009",
                "health_facility" => 4,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2010",
                "health_facility" => 0,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2011",
                "health_facility" => 1,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2012",
                "health_facility" => 0,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2013",
                "health_facility" => 2,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2014",
                "health_facility" => 3,
                "hospital_no" => 1,
            ],
            [
                "starting_year" => "2015",
                "health_facility" => 6,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2016",
                "health_facility" => 5,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2017",
                "health_facility" => 9,
                "hospital_no" => 0,
            ],
            [
                "starting_year" => "2018",
                "health_facility" => 10,
                "hospital_no" => 1,
            ],
            [
                "starting_year" => "2019",
                "health_facility" => 12,
                "hospital_no" => 0 ,
            ],
            [
                "starting_year" => "2020",
                "health_facility" => 8,
                "hospital_no" => 0,
            ],
        ]);
    }
}
