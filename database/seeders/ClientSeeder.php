<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'user_id' => 1,
                'address' => 'Alėjos al. 10, Vilnius',
                'company_code' => '30001548888',
                'vat_nr' => 'LT100001548888',
            ],
            [
                'user_id' => 5,
                'address' => 'Gatvės g. 50, Vilnius',
                'company_code' => '30001543333',
                'vat_nr' => 'LT100001543333',
            ],
        ];

        foreach ($items as $item) {
            Client::firstOrCreate($item);
        }
    }
}
