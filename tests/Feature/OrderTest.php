<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_注文確定ページが表示される(): void
    {
        $this->get('/orders')->assertStatus(200);
    }

    public function test_カートから注文を確定できる(): void
    {
        $product = Product::factory()->create(['name' => 'テスト商品', 'price' => 1000]);
        $sessionId = 'test-session-id';

        $this->withSession(['cart_session_id' => $sessionId])
            ->post('/cart', ['product_id' => $product->id, 'quantity' => 1]);

        $response = $this->withSession(['cart_session_id' => $sessionId])
            ->post('/orders');

        $response->assertRedirect('/orders');
    }

    public function test_注文後にカートが空になる(): void
    {
        $product = Product::factory()->create();
        $sessionId = 'test-session-id';

        $this->withSession(['cart_session_id' => $sessionId])
            ->post('/cart', ['product_id' => $product->id, 'quantity' => 1]);

        $this->withSession(['cart_session_id' => $sessionId])
            ->post('/orders');

        $this->assertDatabaseEmpty('carts');
    }

    public function test_注文履歴が表示される(): void
    {
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }
}
