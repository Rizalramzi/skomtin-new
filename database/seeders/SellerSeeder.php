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
            'name' => 'Suryani',
            'contact' => '089613263629',
            'username' => 'kantin001',
            'password' => Hash::make('kantin001'), // Meng-hash password
        ]);
        Seller::create([
            'name' => 'Eriana Widyarini',
            'contact' => '089613263629',
            'username' => 'kantin002',
            'password' => Hash::make('kantin002'), // Meng-hash password
        ]);
        Seller::create([
            'name' => 'Aziza Indah Karsari',
            'contact' => '089613263629',
            'username' => 'kantin003',
            'password' => Hash::make('kantin003'), // Meng-hash password
        ]);
        Seller::create([
            'name' => 'Nur Tarihoran',
            'contact' => '089613263629',
            'username' => 'kantin004',
            'password' => Hash::make('kantin004'), // Meng-hash password
        ]);
        Seller::create([
            'name' => 'Pujo Santo',
            'contact' => '089613263629',
            'username' => 'kantin005',
            'password' => Hash::make('kantin005'), // Meng-hash password
        ]);
    }
}
