<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel EC</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #2d6a4f;
            --primary-hover: #1b4332;
            --danger: #e63946;
            --danger-hover: #c1121f;
            --bg: #f8f9fa;
            --card: #ffffff;
            --border: #dee2e6;
            --text: #212529;
            --muted: #6c757d;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        nav {
            background: var(--primary);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            height: 60px;
            box-shadow: 0 2px 8px rgba(0,0,0,.15);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: .95rem;
            padding: .4rem .8rem;
            border-radius: 6px;
            transition: background .15s;
        }

        nav a:hover { background: rgba(255,255,255,.15); }
        nav .brand { font-size: 1.2rem; font-weight: 700; margin-right: auto; }

        main {
            max-width: 900px;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        h1 {
            font-size: 1.6rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            border-bottom: 2px solid var(--primary);
            padding-bottom: .5rem;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 1px 4px rgba(0,0,0,.05);
            transition: box-shadow .15s;
        }

        .card:hover { box-shadow: 0 4px 12px rgba(0,0,0,.1); }

        .card-body { flex: 1; }
        .card-title { font-size: 1.05rem; font-weight: 600; }
        .card-text { color: var(--muted); font-size: .9rem; margin-top: .2rem; }
        .price { font-size: 1.1rem; font-weight: 700; color: var(--primary); white-space: nowrap; }

        .badge {
            display: inline-block;
            padding: .2rem .6rem;
            border-radius: 20px;
            font-size: .8rem;
            font-weight: 600;
        }

        .badge-danger { background: #fde8ea; color: var(--danger); }
        .badge-success { background: #d8f3dc; color: var(--primary); }

        .btn {
            display: inline-block;
            padding: .5rem 1.2rem;
            border: none;
            border-radius: 6px;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, transform .1s;
        }

        .btn:active { transform: scale(.97); }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: var(--danger-hover); }
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        .btn-outline:hover { background: var(--primary); color: #fff; }

        .empty {
            text-align: center;
            padding: 3rem;
            color: var(--muted);
            font-size: 1rem;
        }

        input[type="number"] {
            width: 70px;
            padding: .4rem .6rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: .9rem;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .order-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 4px rgba(0,0,0,.05);
        }

        .order-card ul {
            list-style: none;
            margin-top: .8rem;
            padding-left: .5rem;
        }

        .order-card ul li {
            color: var(--muted);
            font-size: .9rem;
            padding: .2rem 0;
            border-bottom: 1px dashed var(--border);
        }

        .order-card ul li:last-child { border-bottom: none; }

        .total {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            margin-top: .5rem;
        }

        .cart-total {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav>
        <a class="brand" href="/">🛍 Laravel EC</a>
        <a href="/products">商品一覧</a>
        <a href="/cart">カート</a>
        <a href="/orders">注文履歴</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
