<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'Tシャツ',       'price' => 2000,  'stock' => 10, 'category' => 'トップス',  'description' => 'シンプルなTシャツです。']);
        Product::create(['name' => 'ポロシャツ',    'price' => 3500,  'stock' => 8,  'category' => 'トップス',  'description' => '上品なポロシャツです。']);
        Product::create(['name' => 'パーカー',      'price' => 5500,  'stock' => 6,  'category' => 'トップス',  'description' => '暖かいパーカーです。']);
        Product::create(['name' => 'ジーンズ',      'price' => 5000,  'stock' => 5,  'category' => 'ボトムス',  'description' => 'スリムフィットのジーンズです。']);
        Product::create(['name' => 'チノパン',      'price' => 4500,  'stock' => 7,  'category' => 'ボトムス',  'description' => 'カジュアルなチノパンです。']);
        Product::create(['name' => 'ショートパンツ','price' => 3000,  'stock' => 9,  'category' => 'ボトムス',  'description' => '夏向けショートパンツです。']);
        Product::create(['name' => 'スニーカー',    'price' => 8000,  'stock' => 3,  'category' => 'シューズ',  'description' => '軽量で履きやすいスニーカーです。']);
        Product::create(['name' => 'ローファー',    'price' => 9500,  'stock' => 4,  'category' => 'シューズ',  'description' => 'きれいめなローファーです。']);
        Product::create(['name' => 'キャップ',      'price' => 2500,  'stock' => 12, 'category' => 'アクセサリー', 'description' => 'シンプルなキャップです。']);
        Product::create(['name' => 'トートバッグ',  'price' => 4000,  'stock' => 6,  'category' => 'アクセサリー', 'description' => '大容量のトートバッグです。']);
    }
}
