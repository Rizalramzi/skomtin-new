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
        Store::create([
            'name' => 'Kantin Skomda',
            'image' => 'assets/store/kantinskomda.JPG',
            'seller_id' => 1
        ]);
        Store::create([
            'name' => 'Kantin Bu Eri',
            'image' => 'assets/store/kantinbueri.JPG',
            'seller_id' => 2
        ]);
        Store::create([
            'name' => 'Kantin Bu Zie',
            'image' => 'assets/store/kantinbuzie.JPG',
            'seller_id' => 3
        ]);
        Store::create([
            'name' => 'Kantin Kak Nur',
            'image' => 'assets/store/kantinkaknur.JPG',
            'seller_id' => 4
        ]);
        Store::create([
            'name' => 'Kantin Bersaudara',
            'image' => 'assets/store/kantinbersaudara.JPG',
            'seller_id' => 5
        ]);
    }
}
