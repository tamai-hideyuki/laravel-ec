@extends('layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
        <h1 style="margin:0; border:none; padding:0;">管理者：商品一覧</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ 新規登録</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="background:#d8f3dc; color:var(--primary); border:1px solid #b7e4c7; border-radius:6px; padding:.8rem 1.2rem; margin-bottom:1rem;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse:collapse; background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,.05);">
        <thead style="background:var(--primary); color:#fff;">
            <tr>
                <th style="padding:.8rem 1rem; text-align:left; font-size:.9rem;">ID</th>
                <th style="padding:.8rem 1rem; text-align:left; font-size:.9rem;">商品名</th>
                <th style="padding:.8rem 1rem; text-align:left; font-size:.9rem;">カテゴリ</th>
                <th style="padding:.8rem 1rem; text-align:right; font-size:.9rem;">価格</th>
                <th style="padding:.8rem 1rem; text-align:right; font-size:.9rem;">在庫</th>
                <th style="padding:.8rem 1rem; text-align:center; font-size:.9rem;">操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr style="border-bottom:1px solid var(--border);">
                    <td style="padding:.7rem 1rem; color:var(--muted); font-size:.9rem;">{{ $product->id }}</td>
                    <td style="padding:.7rem 1rem; font-weight:600;">{{ $product->name }}</td>
                    <td style="padding:.7rem 1rem;">
                        @if ($product->category)
                            <span class="badge" style="background:#e8f4fd; color:#1a6fa8;">{{ $product->category }}</span>
                        @else
                            <span style="color:var(--muted); font-size:.85rem;">—</span>
                        @endif
                    </td>
                    <td style="padding:.7rem 1rem; text-align:right; font-weight:700; color:var(--primary);">{{ number_format($product->price) }}円</td>
                    <td style="padding:.7rem 1rem; text-align:right;">
                        @if ($product->stock === 0)
                            <span class="badge badge-danger">0</span>
                        @else
                            {{ $product->stock }}
                        @endif
                    </td>
                    <td style="padding:.7rem 1rem; text-align:center; white-space:nowrap; display:flex; gap:.4rem; justify-content:center;">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline" style="padding:.3rem .8rem; font-size:.85rem;">編集</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('削除しますか？')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding:.3rem .8rem; font-size:.85rem;">削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="padding:2rem; text-align:center; color:var(--muted);">商品がありません</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1.5rem;">
        {{ $products->links() }}
    </div>
@endsection
