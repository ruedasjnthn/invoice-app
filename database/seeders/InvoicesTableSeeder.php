<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice; // Import the Invoice model

class InvoicesTableSeeder extends Seeder
{
    public function run()
    {
        // Create sample invoices
        for ($i = 1; $i <= 10; $i++) {
            Invoice::create([
                'user_id' => 1, // Replace with the desired user ID
                'client_name' => 'Client ' . $i,
                'client_email' => 'client' . $i . '@example.com',
                'client_street_address' => 'Client Street ' . $i,
                'client_city' => 'Client City ' . $i,
                'client_postal_code' => 'Client Postal ' . $i,
                'client_country' => 'Client Country ' . $i,
                'street_address' => 'Street ' . $i,
                'city' => 'City ' . $i,
                'postal_code' => 'Postal ' . $i,
                'country' => 'Country ' . $i,
                'invoice_date' => now(),
                'payment_terms' => 'NET30',
                'project_description' => 'Sample Project ' . $i,
                'item_list' => json_encode(['Item 1', 'Item 2']),
                'status' => 'Pending',
            ]);
        }
    }
}
