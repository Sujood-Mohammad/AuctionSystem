<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Chocolate Cake',
            'description' => 'Delicious chocolate cake with creamy frosting.',
            'image' => 'chocolate_cake.jpg',
            'user_id' => 1,
        ]);

        Product::create([
            'name' => 'Vanilla Ice Cream',
            'description' => 'Smooth and creamy vanilla ice cream.',
            'image' => 'vanilla_ice_cream.jpg',
            'user_id' => 3, 
        ]);

        Product::create([
            'name' => 'Fruit Tart',
            'description' => 'A sweet tart topped with fresh fruits.',
            'image' => 'fruit_tart.jpg',
            'user_id' => 1,
        ]);
    }
}
