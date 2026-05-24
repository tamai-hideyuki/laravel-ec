<!DOCTYPE html>
<html>
<body>
    <h1>商品一覧</h1>

    @forelse ($products as $product)
        <div>
            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
            <span>{{ $product->price }}円</span>
        </div>
    @empty
        <p>商品がありません</p>
    @endforelse
</body>
</html>
