<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::insert([
            ['name' => 'Bu zie', 'seller_id' => 1],
            ['name' => 'Kak nur', 'seller_id' => 2],
        ]);
    }
}
