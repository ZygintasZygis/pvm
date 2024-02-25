<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'bill_id' => 1,
                'name' => 'Prekė 1',
                'amount' => 10,
                'price' => 2.50,
            ],
            [
                'bill_id' => 1,
                'name' => 'Prekė 2',
                'amount' => 2,
                'price' => 4,
            ],
            [
                'bill_id' => 1,
                'name' => 'Prekė 3',
                'amount' => 4,
                'price' => 5.55,
            ],
        ];

        foreach ($items as $item) {
            Product::firstOrCreate($item);
        }
    }
}
