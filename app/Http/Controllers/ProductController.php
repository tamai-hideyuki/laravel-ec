<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(9)->withQueryString();
        $categories = Product::select('category')->whereNotNull('category')->distinct()->pluck('category');

        return view('products.index', compact('products', 'categories'));
    }

    // show：該当商品を取得してビューに渡す（存在しなければ404）
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

}
