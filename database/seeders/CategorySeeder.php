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
        Category::insert([
            ['name' => 'Jajanan', 'image' => 'assets/categories/snack-category.png'],
            ['name' => 'Sarapan', 'image' => 'assets/categories/rice-category.png'],
            ['name' => 'Minuman', 'image' => 'assets/categories/drink-category.png'],
        ]);
    }
}
