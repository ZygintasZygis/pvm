<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'client_id' => 1,
                'bill_date' => '2023-09-01',
                'invoice_nr' => 'XXX Nr. 001',
                'bank_acc_nr' => 'LT10000323632635',
                'payment_purpose' => 'Užsakymas XXX Nr. 001',
            ],
            [
                'client_id' => 1,
                'bill_date' => '2023-09-02',
                'invoice_nr' => 'XXX Nr. 002',
                'bank_acc_nr' => 'LT10000323632635',
                'payment_purpose' => 'Užsakymas XXX Nr. 002',
            ],
            [
                'client_id' => 1,
                'bill_date' => '2023-09-03',
                'invoice_nr' => 'XXX Nr. 003',
                'bank_acc_nr' => 'LT10000323632635',
                'payment_purpose' => 'Užsakymas XXX Nr. 003',
            ],
        ];

        foreach ($items as $item) {
            Bill::firstOrCreate($item);
        }
    }
}
