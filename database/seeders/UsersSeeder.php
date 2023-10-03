<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Hasan Alilhadi',
                'username' => 'mrlaruso',
                'password' => bcrypt('RandomPassword'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
