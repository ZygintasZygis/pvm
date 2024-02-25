<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

/**
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        $user = new User();

        $modules = [
            [
                'username' => $user->generateUsername(),
                'name' => 'Super Admin',
                'email' => 'sd@gmail.com',
                'password' => Hash::make('superadmin123'),
            ],
            [
                'username' => $user->generateUsername(),
                'name' => 'Admin',
                'email' => 'a@gmail.com',
                'password' => Hash::make('admin123'),
            ],
            [
                'username' => $user->generateUsername(),
                'name' => 'UAB "Bendrovė"',
                'email' => 'v2.p2@gmail.com',
                'password' => Hash::make('client1'),
            ],
            [
                'username' => $user->generateUsername(),
                'name' => 'Klientas',
                'email' => 'v3.p3@gmail.com',
                'password' => Hash::make('client1'),
            ],
            [
                'username' => $user->generateUsername(),
                'name' => 'Buhalteris',
                'email' => 'v4.p4@gmail.com',
                'password' => Hash::make('accountant'),
            ]
        ];

        foreach ($modules as $module) {
            (new User)->firstOrCreate($module);
        }
    }
}
