@extends('layouts.app')

@section('content')
    <h1>商品一覧</h1>

    <form method="GET" action="/products" style="display:flex; gap:.6rem; margin-bottom:1.5rem; flex-wrap:wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="商品名・説明で検索..."
               style="flex:1; min-width:180px; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.9rem;">
        <select name="category" style="padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.9rem; background:#fff;">
            <option value="">すべてのカテゴリ</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">検索</button>
        @if (request('search') || request('category'))
            <a href="/products" class="btn btn-outline">リセット</a>
        @endif
    </form>

    @forelse ($products as $product)
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <a href="/products/{{ $product->id }}" style="text-decoration:none; color:inherit;">
                        {{ $product->name }}
                    </a>
                </div>
                <div class="card-text">{{ $product->description }}</div>
                <div style="margin-top:.4rem; display:flex; gap:.4rem; align-items:center;">
                    @if ($product->category)
                        <span class="badge" style="background:#e8f4fd; color:#1a6fa8;">{{ $product->category }}</span>
                    @endif
                    @if ($product->stock === 0)
                        <span class="badge badge-danger">在庫切れ</span>
                    @else
                        <span class="badge badge-success">在庫 {{ $product->stock }}個</span>
                    @endif
                </div>
            </div>
            <div class="price">{{ number_format($product->price) }}円</div>
            <a href="/products/{{ $product->id }}" class="btn btn-outline">詳細</a>
        </div>
    @empty
        <div class="empty">商品が見つかりませんでした</div>
    @endforelse

    <div style="margin-top:1.5rem;">
        {{ $products->links() }}
    </div>
@endsection
