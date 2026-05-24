<!DOCTYPE html>
<html>
<body>
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->price }}円</p>
    <p>{{ $product->description }}</p>

    @if ($product->stock === 0)
        <p>在庫切れ</p>
    @else
        <p>在庫：{{ $product->stock }}個</p>
    @endif
</body>
</html>
