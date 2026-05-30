@extends('layouts.app')

@section('content')
    <a href="/orders" class="btn btn-outline" style="margin-bottom:1.5rem; display:inline-block;">← 注文履歴に戻る</a>

    <h1>注文詳細 #{{ $order->id }}</h1>

    <div class="order-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
            <span style="color:var(--muted); font-size:.9rem;">注文日時：{{ $order->created_at->format('Y/m/d H:i') }}</span>
        </div>

        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom:2px solid var(--border);">
                    <th style="text-align:left; padding:.6rem .4rem; font-size:.9rem; color:var(--muted);">商品名</th>
                    <th style="text-align:right; padding:.6rem .4rem; font-size:.9rem; color:var(--muted);">単価</th>
                    <th style="text-align:right; padding:.6rem .4rem; font-size:.9rem; color:var(--muted);">数量</th>
                    <th style="text-align:right; padding:.6rem .4rem; font-size:.9rem; color:var(--muted);">小計</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr style="border-bottom:1px dashed var(--border);">
                        <td style="padding:.7rem .4rem;">{{ $item->product->name }}</td>
                        <td style="padding:.7rem .4rem; text-align:right;">{{ number_format($item->price) }}円</td>
                        <td style="padding:.7rem .4rem; text-align:right;">{{ $item->quantity }}個</td>
                        <td style="padding:.7rem .4rem; text-align:right; font-weight:600;">{{ number_format($item->price * $item->quantity) }}円</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display:flex; justify-content:flex-end; margin-top:1rem; padding-top:.8rem; border-top:2px solid var(--border);">
            <span style="font-size:1.1rem; font-weight:700; color:var(--primary);">合計：{{ number_format($order->total_price) }}円</span>
        </div>
    </div>
@endsection
