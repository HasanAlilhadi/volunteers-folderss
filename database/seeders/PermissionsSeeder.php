<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                // 1
                'key' => 'add_user',
                'name' => 'اضافة مستخدم',
                'group' => 'user',
            ],
            [
                // 2
                'key' => 'edit_user',
                'name' => 'تعديل مستخدم',
                'group' => 'user',
            ],
            [
                // 3
                'key' => 'delete_user',
                'name' => 'حذف مستخدم',
                'group' => 'user',
            ],
            [
                // 6
                'key' => 'print_user',
                'name' => 'طباعة اليوزرات',
                'group' => 'user',
            ],
            [
                // 4
                'key' => 'add_volunteer',
                'name' => 'اضافة متطوع',
                'group' => 'volunteer',
            ],
            [
                // 5
                'key' => 'edit_volunteer',
                'name' => 'تعديل متطوع',
                'group' => 'volunteer',
            ],
            [
                // 5
                'key' => 'delete_volunteer',
                'name' => 'حذف متطوع',
                'group' => 'volunteer',
            ],

            [
                // 7
                'key' => 'print_volunteer',
                'name' => 'طباعة المتطوعين',
                'group' => 'volunteer',
            ],
        ];

        $userPermissions = [
            [
                'user_id' => 1,
                'permission_id' => 1,
            ],
            [
                'user_id' => 1,
                'permission_id' => 2,
            ],
            [
                'user_id' => 1,
                'permission_id' => 3,
            ],
            [
                'user_id' => 1,
                'permission_id' => 4,
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        foreach ($userPermissions as $userPermission) {
            UserPermission::create($userPermission);
        }
    }
}
