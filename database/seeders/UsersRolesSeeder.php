<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsersRoles;

/**
 * Class UsersRolesSeeder
 * @package Database\Seeders
 */
class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 1,
                'role_id' => 2,
            ],
            [
                'user_id' => 1,
                'role_id' => 3,
            ],
            [
                'user_id' => 2,
                'role_id' => 1,
            ],
            [
                'user_id' => 3,
                'role_id' => 2,
            ],
            [
                'user_id' => 4,
                'role_id' => 2,
            ],
            [
                'user_id' => 5,
                'role_id' => 3,
            ],
        ];

        foreach ($modules as $module) {
            UsersRoles::firstOrCreate($module);
        }
    }
}
