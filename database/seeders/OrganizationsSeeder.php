<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                "name" => "Orgi 1",
                "code" => "111",
                "created_by" => 1,
            ],
            [
                "name" => "Orgi 2",
                "code" => "222",
                "created_by" => 1,
            ],
        ];

        foreach ($organizations as $organization) {
            Organization::create($organization);
        }
    }
}
