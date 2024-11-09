<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::create([
            'user_id' => 2, // buyer ID
            'product_id' => 1, // Chocolate Cake
            'offer_price' => 80.00,
        ]);

        Offer::create([
            'user_id' => 2, // buyer ID
            'product_id' => 2, // Vanilla Ice Cream
            'offer_price' => 50.00,
        ]);

        Offer::create([
            'user_id' => 2, // buyer ID
            'product_id' => 3, // Fruit Tart
            'offer_price' => 45.00,
        ]);

    }
}
