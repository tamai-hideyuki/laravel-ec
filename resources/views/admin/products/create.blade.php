@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline" style="margin-bottom:1.5rem; display:inline-block;">← 商品一覧に戻る</a>

    <h1>商品登録</h1>

    <div class="order-card">
        @if ($errors->any())
            <div style="background:#fde8ea; color:var(--danger); border:1px solid #f5c6cb; border-radius:6px; padding:.8rem 1.2rem; margin-bottom:1rem;">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            @include('admin.products._form')
            <div style="margin-top:1.5rem;">
                <button type="submit" class="btn btn-primary">登録する</button>
            </div>
        </form>
    </div>
@endsection
