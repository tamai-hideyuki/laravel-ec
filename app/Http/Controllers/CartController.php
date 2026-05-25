<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function cartSessionId(): string
    {
        if (!session()->has('cart_session_id')) {
            session()->put('cart_session_id', session()->getId());
        }

        return session()->get('cart_session_id');
    }

    public function index()
    {
        $carts = Cart::where('session_id', $this->cartSessionId())->get();

        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        Cart::create([
            'session_id' => $this->cartSessionId(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect('/cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect('/cart');
    }
}
