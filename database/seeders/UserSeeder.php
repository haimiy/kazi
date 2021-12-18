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
                "first_name" => "khairat",
                "middle_name" => "Makame",
                "last_name" => "Issa",
                "email" => "khairat096@gmail.com",
                "role_id" => 2,
                "password" => Hash::make("root"),
                "phone_no" => "root",
                "address" => "Fuoni",
            ],
            [
                "first_name" => "Dua",
                "middle_name" => "Suleiman",
                "last_name" => "Mussa",
                "email" => "dua@gmail.com",
                "role_id" => 3,
                "password" => Hash::make("1234"),
                "phone_no" => "0773780575",
                "address" => "Fuoni",
            ],
            [
                "first_name" => "Safia",
                "middle_name" => "Sleiman",
                "last_name" => "Iddi",
                "email" => "safi@gmail.com",
                "role_id" => 4,
                "password" => Hash::make("1234"),
                "phone_no" => "0693858355",
                "address" => "Fuoni",
            ]

        ]);

        DB::table('registrar')->insert([
            "user_id" => 2,
            "title" => 'phab director',
            "signature" => 'DuaSleimanMussa',
        ]);
        DB::table('inspectors')->insert([
            "user_id" => 3,
            "title" => 'IT',
            'inspector_type' => 'everything',
            "signature" => 'SafiaSleimanIddi',
        ]);
    }
}
