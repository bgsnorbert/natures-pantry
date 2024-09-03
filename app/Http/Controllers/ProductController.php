<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('products.products', [
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return view('products.product', ['product' => $product]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        // authorize
        request()->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required']
        ]);
        Product::create([
            'name' => request('name'),
            'price' => request('price'),
        ]);
        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        // authorize
        request()->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required']
        ]);
        $product->update([
            'name' => request('name'),
            'price' => request('price')
        ]);
        return redirect('/products/' . $product->id);
    }

    public function delete(Product $product)
    {
        // authorize
        $product->delete();
        return redirect('/products');
    }
}
