<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        Product::create($request->only('name', 'price', 'stock', 'category', 'description'));

        return redirect()->route('admin.products.index')->with('success', '商品を登録しました。');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $product->update($request->only('name', 'price', 'stock', 'category', 'description'));

        return redirect()->route('admin.products.index')->with('success', '商品を更新しました。');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', '商品を削除しました。');
    }
}
