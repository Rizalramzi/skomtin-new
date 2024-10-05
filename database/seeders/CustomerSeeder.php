<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'John Doe',
            'nisn' => '123456789',
            'password' => Hash::make('keren123'), // Pastikan untuk meng-hash password
            'class' => '10A'
        ]);

        Customer::create([
            'name' => 'Jane Doe',
            'nisn' => '987654321',
            'password' => Hash::make('password123'), // Contoh data lainnya
            'class' => '10B'
        ]);
    }
}
