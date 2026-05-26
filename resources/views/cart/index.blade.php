@extends('layouts.app')

@section('content')
    <h1>カート</h1>

    @forelse ($carts as $cart)
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{ $cart->product->name }}</div>
                <div class="card-text">{{ $cart->quantity }}個</div>
            </div>
            <div class="price">{{ number_format($cart->product->price * $cart->quantity) }}円</div>
            <form method="POST" action="/cart/{{ $cart->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
    @empty
        <div class="empty">カートに商品がありません</div>
    @endforelse

    @if ($carts->isNotEmpty())
        <div class="cart-total">
            <span style="font-weight:600; font-size:1rem;">合計</span>
            <span class="price" style="font-size:1.3rem;">
                {{ number_format($carts->sum(fn($c) => $c->product->price * $c->quantity)) }}円
            </span>
        </div>
        <form method="POST" action="/orders" style="margin-top:1rem; text-align:right;">
            @csrf
            <button type="submit" class="btn btn-primary" style="font-size:1rem; padding:.7rem 2rem;">注文を確定する</button>
        </form>
    @endif
@endsection
