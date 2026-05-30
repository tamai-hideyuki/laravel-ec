<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function store()
    {
        $carts = Cart::where('session_id', session('cart_session_id'))->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect('/cart');
        }

        DB::transaction(function () use ($carts) {
            $order = Order::create([
                'total_price' => $carts->sum(fn($cart) => $cart->product->price * $cart->quantity),
            ]);

            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity'   => $cart->quantity,
                    'price'      => $cart->product->price,
                ]);
                $cart->product->decrement('stock', $cart->quantity);
            }

            Cart::where('session_id', session('cart_session_id'))->delete();
        });

        return redirect('/orders');
    }
}
