<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "role_name" => "SuperAdmin"
            ],
            [
                "role_name" => "Admin"
            ],
            [
                "role_name" => "Registrar"
            ],
            [
                "role_name" => "Inspector"
            ],
            [
                "role_name" => "Owner"
            ]
        ]);
    }
}
