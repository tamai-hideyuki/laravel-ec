<!DOCTYPE html>
<html>
<body>
    <h1>カート</h1>

    @forelse ($carts as $cart)
        <div>
            <span>{{ $cart->product->name }}</span>
            <span>{{ $cart->quantity }}個</span>
            <form method="POST" action="/cart/{{ $cart->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </div>
    @empty
        <p>商品がありません</p>
    @endforelse
</body>
</html>
