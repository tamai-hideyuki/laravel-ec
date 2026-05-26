@extends('layouts.app')

@section('content')
    <h1>商品一覧</h1>

    @forelse ($products as $product)
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <a href="/products/{{ $product->id }}" style="text-decoration:none; color:inherit;">
                        {{ $product->name }}
                    </a>
                </div>
                <div class="card-text">{{ $product->description }}</div>
                <div style="margin-top:.4rem;">
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
        <div class="empty">商品がありません</div>
    @endforelse
@endsection
