<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class VolunteersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $volunteers = [
            [
                'organization_id' => 1,
                'approve_id' => null,
                'job_termination_id' => 'hellohellohello',
                'first_name' => 'Hasan',
                'second_name' => 'Alilhadi',
                'third_name' => 'Mustafa',
                'forth_name' => 'Merdan',
                'nickname' => 'Wendawi',
                'mother_first_name' => 'Mother',
                'mother_second_name' => 'MSecond',
                'mother_third_name' => 'MThird',
                'birthdate' => Carbon::create(2001, 11, 21),
                'birthplace' => 'Iraq, Tuzhurmatu',
                'father_birthdate' => Carbon::create(1966, 6, 6),
                'father_birthplace' => 'Iraq, Tuzhurmatu',
                'city' => 'Karbala',
                'district' => 'Hay Al-Abbas',
                'nahiya' => 'Abbas',
                'mahala' => 'Some Mahala',
                'zuqaq' => 'ZUQAQ',
                'house_number' => '123 House',
                'nearest_point' => 'Al Abbas neighborhood dispensary',
                'academic_achivement' => 4,
                'is_married' => 1,
                'national_id_number' => '902186591402837',
                'have_volunteered' => false,
                'previous_location' => null,
                'belong_to_political_movement' => false,
                'occupation' => 'programmer',
                'phone_number' => '+96407703014900',
                'languages' => ['Turkish', 'Arabic', 'English'],
                'code_number' => '8921734581237',
                'special_needs' => false,
                'diseases' => null,
            ],
        ];

        foreach ($volunteers as $volunteer) {
            Volunteer::create($volunteer);
        }
    }
}
