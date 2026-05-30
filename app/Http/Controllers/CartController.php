<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $existing = Cart::where('session_id', $this->cartSessionId())
            ->where('product_id', $product->id)
            ->first();

        $totalQuantity = ($existing ? $existing->quantity : 0) + $request->quantity;

        if ($totalQuantity > $product->stock) {
            return back()->withErrors(['quantity' => "在庫が不足しています（残り{$product->stock}個）"]);
        }

        if ($existing) {
            $existing->update(['quantity' => $totalQuantity]);
        } else {
            Cart::create([
                'session_id' => $this->cartSessionId(),
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
            ]);
        }

        return redirect('/cart');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        if ($request->quantity > $cart->product->stock) {
            return back()->withErrors(['quantity' => "在庫が不足しています（残り{$cart->product->stock}個）"]);
        }

        $cart->update(['quantity' => $request->quantity]);

        return redirect('/cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect('/cart');
    }
}
