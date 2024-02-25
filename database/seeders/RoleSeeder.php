<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'role' => 'administrator',
            ],
            [
                'role' => 'client',
            ],
            [
                'role' => 'accountant',
            ],
        ];

        foreach ($items as $item) {
            Role::firstOrCreate($item);
        }
    }
}
