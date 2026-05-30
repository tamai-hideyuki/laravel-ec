@extends('layouts.app')

@section('content')
    <h1>注文履歴</h1>

    @forelse ($orders as $order)
        <div class="order-card">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <span style="font-weight:600;">注文番号 #{{ $order->id }}</span>
                <span style="color:#888; font-size:.85rem;">{{ $order->created_at->format('Y/m/d H:i') }}</span>
            </div>
            <ul>
                @foreach ($order->items as $item)
                    <li>{{ $item->product->name }} × {{ $item->quantity }}個 — {{ number_format($item->price) }}円</li>
                @endforeach
            </ul>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:.5rem;">
                <div class="total">合計：{{ number_format($order->total_price) }}円</div>
                <a href="/orders/{{ $order->id }}" class="btn btn-outline" style="font-size:.85rem; padding:.3rem .8rem;">詳細</a>
            </div>
        </div>
    @empty
        <div class="empty">注文履歴がありません</div>
    @endforelse

    <div style="margin-top:1.5rem;">
        {{ $orders->links() }}
    </div>
@endsection
