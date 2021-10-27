<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            TypeOfHealthUnitSeeder::class,
            UserSeeder::class,
            OccupationSeeder::class,
            DistrictSeeder::class,
            AuthorityResponsibleSeeder::class,
            TypeOfServiceSeeder::class,
            PremisesTypeSeeder::class,
            TypeOfWardSeeder::class,
        ]);
    }
}
