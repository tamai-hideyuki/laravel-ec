<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'Tシャツ', 'price' => 2000, 'stock' => 10, 'description' => 'シンプルなTシャツです。']);
        Product::create(['name' => 'ジーンズ', 'price' => 5000, 'stock' => 5, 'description' => 'スリムフィットのジーンズです。']);
        Product::create(['name' => 'スニーカー', 'price' => 8000, 'stock' => 3, 'description' => '軽量で履きやすいスニーカーです。']);
    }
}
