<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_カート一覧ページが表示される(): void
    {
        $this->get('/cart')->assertStatus(200);
    }

    public function test_商品をカートに追加できる(): void
    {
        $product = Product::factory()->create(['name' => 'テスト商品', 'price' => 1000]);

        $response = $this->post('/cart', ['product_id' => $product->id, 'quantity' => 1]);

        $response->assertRedirect('/cart');
    }

    public function test_カートに追加した商品が表示される(): void
    {
        $product = Product::factory()->create(['name' => 'テスト商品', 'price' => 1000]);
        $sessionId = 'test-session-id';

        $this->withSession(['cart_session_id' => $sessionId])
            ->post('/cart', ['product_id' => $product->id, 'quantity' => 1]);

        $response = $this->withSession(['cart_session_id' => $sessionId])
            ->get('/cart');

        $response->assertSee('テスト商品');
    }

    public function test_カートから商品を削除できる(): void
    {
        $cart = \App\Models\Cart::factory()->create();

        $response = $this->delete("/cart/{$cart->id}");

        $response->assertRedirect('/cart');
    }
}
