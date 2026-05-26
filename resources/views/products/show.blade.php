@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-outline" style="margin-bottom:1.5rem; display:inline-block;">← 一覧に戻る</a>

    <div class="card" style="flex-direction: column; align-items: flex-start; gap: .8rem;">
        <h1 style="border:none; margin:0;">{{ $product->name }}</h1>
        <div class="price" style="font-size:1.5rem;">{{ number_format($product->price) }}円</div>
        <p style="color: #555;">{{ $product->description }}</p>

        @if ($product->stock === 0)
            <span class="badge badge-danger" style="font-size:.95rem; padding:.4rem 1rem;">在庫切れ</span>
        @else
            <span class="badge badge-success">在庫 {{ $product->stock }}個</span>
            <form method="POST" action="/cart">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="quantity-form">
                    <label style="font-weight:600;">数量</label>
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                    <button type="submit" class="btn btn-primary">カートに追加</button>
                </div>
            </form>
        @endif
    </div>
@endsection
