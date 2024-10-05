<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::create([
            'name' => 'Seller A',
            'contact' => '08123456789',
            'username' => 'sellerA',
            'password' => Hash::make('password'), // Meng-hash password
        ]);

        Seller::create([
            'name' => 'Seller B',
            'contact' => '08987654321',
            'username' => 'sellerB',
            'password' => Hash::make('password123'), // Contoh data lainnya
        ]);
    }
}
