<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "first_name" => "safia",
                "middle_name" => "sleiman",
                "last_name" => "iddi",
                "email" => "swafaa.sule@gmail.com",
                "role_id" => 2,
                "password" => Hash::make("1234"),
                "phone_no" => "admin",
                "address" => "Fuoni",
            ],
            [
                "first_name" => "khairat",
                "middle_name" => "Makame",
                "last_name" => "Issa",
                "email" => "khai@gmail.com",
                "role_id" => 5,
                "password" => Hash::make("1234"),
                "phone_no" => "owner",
                "address" => "Fuoni",
            ],
            [
                "first_name" => "khairat",
                "middle_name" => "Makame",
                "last_name" => "Issa",
                "email" => "k@gmail.com",
                "role_id" => 4,
                "password" => Hash::make("1234"),
                "phone_no" => "inspector",
                "address" => "Fuoni",
            ],
            [
                "first_name" => "khairat",
                "middle_name" => "Makame",
                "last_name" => "Issa",
                "email" => "r@gmail.com",
                "role_id" => 3,
                "password" => Hash::make("1234"),
                "phone_no" => "registrar",
                "address" => "Fuoni",
            ]

        ]);

        DB::table('owner')->insert([
            "person_incharge" => 2,
            "health_facility_id" => 1,
            "designation" => 'Director wa Hospital',
            "ownership_type" => 'Solo',
        ]);
    }
}
