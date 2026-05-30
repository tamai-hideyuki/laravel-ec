@extends('layouts.app')

@section('content')
    <h1>カート</h1>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @forelse ($carts as $cart)
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{ $cart->product->name }}</div>
                <div class="card-text" style="color: var(--muted); font-size:.85rem;">在庫 {{ $cart->product->stock }}個</div>
            </div>
            <form method="POST" action="/cart/{{ $cart->id }}" style="display:flex; align-items:center; gap:.5rem;">
                @csrf
                @method('PATCH')
                <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}" style="width:65px;">
                <button type="submit" class="btn btn-outline" style="padding:.4rem .8rem; font-size:.85rem;">更新</button>
            </form>
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
