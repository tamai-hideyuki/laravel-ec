<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function store()
    {
        $carts = Cart::where('session_id', session('cart_session_id'))->get();

        $order = Order::create([
            'total_price' => $carts->sum(fn($cart) => $cart->product->price * $cart->quantity),
        ]);

        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
        }

        Cart::where('session_id', session('cart_session_id'))->delete();

        return redirect('/orders');
    }
}
