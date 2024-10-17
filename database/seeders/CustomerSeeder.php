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
            'first_name' => 'Muhammad',
            'last_name' => 'Rizal Ramzi',
            'email' => 'rmzi@gmail.com',
            'telephone' => '089582630192',
            'nisn' => '123456789',
            'password' => Hash::make('keren123'), // Pastikan untuk meng-hash password
            'class' => 'XII SIJA 1'
        ]);

        Customer::create([
            'first_name' => 'Arka',
            'last_name' => 'Jenar',
            'email' => 'arka@gmail.com',
            'telephone' => '089522637192',
            'nisn' => '987654321',
            'password' => Hash::make('keren123'), // Pastikan untuk meng-hash password
            'class' => 'XII SIJA 1'
        ]);
    }
}
