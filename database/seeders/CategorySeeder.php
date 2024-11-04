<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Aneka Nasi',
            'image' => 'assets/category/rice-category.png'
        ]);
        Category::create([
            'name' => 'Menu Sarapan',
            'image' => 'assets/category/breakfast-category.png'
        ]);
        Category::create([
            'name' => 'Minuman',
            'image' => 'assets/category/drink-category.png'
        ]);
        Category::create([
            'name' => 'Kopi',
            'image' => 'assets/category/coffe-category.png'
        ]);
        Category::create([
            'name' => 'Mie',
            'image' => 'assets/category/noodle-category.png'
        ]);
        Category::create([
            'name' => 'Makanan Ringan',
            'image' => 'assets/category/snack-category.png'
        ]);
    }
}
