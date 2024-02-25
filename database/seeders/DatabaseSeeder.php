<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Bill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            UsersRolesSeeder::class,
            ClientSeeder::class,
            BillSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
