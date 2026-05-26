<!DOCTYPE html>
<html>
<body>
    <h1>注文履歴</h1>

    @forelse ($orders as $order)
        <div>
            <p>注文番号：{{ $order->id }}</p>
            <p>合計金額：{{ $order->total_price }}円</p>
            <ul>
                @foreach ($order->items as $item)
                    <li>{{ $item->product->name }} × {{ $item->quantity }}個</li>
                @endforeach
            </ul>
        </div>
    @empty
        <p>注文履歴がありません</p>
    @endforelse
</body>
</html>
