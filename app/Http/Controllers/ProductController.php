<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // index：全商品を取得してビューに渡す
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // show：該当商品を取得してビューに渡す（存在しなければ404）
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

}
