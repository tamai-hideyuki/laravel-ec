<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_商品一覧ページが表示される(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_商品が一覧に表示される(): void
    {
        Product::factory()->create(['name' => 'テスト商品', 'price' => 1000]);

        $response = $this->get('/products');

        $response->assertSee('テスト商品');
        $response->assertSee('1000');
    }

    public function test_商品が存在しない場合は空の一覧が表示される(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('商品がありません');
    }

    public function test_商品詳細ページが表示される(): void
    {
        $product = Product::factory()->create(['name' => 'テスト商品', 'price' => 1000]);

        $response = $this->get("/products/{$product->id}");

        $response->assertStatus(200);
        $response->assertSee('テスト商品');
        $response->assertSee('1000');
    }

    public function test_存在しない商品の詳細は404になる(): void
    {
        $response = $this->get('/products/999');
        $response->assertStatus(404);
    }

    public function test_在庫切れ商品は在庫切れと表示される(): void
    {
        $product = Product::factory()->create(['stock' => 0]);

        $response = $this->get("/products/{$product->id}");

        $response->assertSee('在庫切れ');
    }
}
