<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ali',
            'email' => 'ali@seller.com',
            'type' => 'seller',
            'phone_number' => '1234567890',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Sara',
            'email' => 'sara@buyer.com',
            'type' => 'buyer',
            'phone_number' => '0987654321',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Omar',
            'email' => 'omar@seller.com',
            'type' => 'seller',
            'phone_number' => '1122334455',
            'password' => Hash::make('password')
        ]);
    }
}
