<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\OrganizationsSeeder;
use Database\Seeders\UsersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UsersSeeder::class,
            OrganizationsSeeder::class,
            PermissionsSeeder::class,
            VolunteersSeeder::class,
        ]);
    }
}
