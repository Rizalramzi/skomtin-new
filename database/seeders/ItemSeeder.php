<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::insert([
            ['name' => 'Kopi', 'quantity' => 10, 'price' => 5000, 'image' => 'assets/images/drink-image.png', 'store_id' => 1, 'category_id' => 3],
            ['name' => 'Nasi Goreng', 'quantity' => 50, 'price' => 10000, 'image' => 'assets/images/food-image.png', 'store_id' => 2, 'category_id' => 2],
        ]);
    }
}
