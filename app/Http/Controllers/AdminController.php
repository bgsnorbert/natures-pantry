<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showproducts()
    {
        $categories = Category::all();
        $selectedCategories = request()->input('categories', []);

        $query = Product::with('category');

        if (!empty($selectedCategories)) {
            $query->whereIn('category_id', $selectedCategories);
        }


        $products = $query->paginate(2);
        return view('admin.products', compact('products', 'categories', 'selectedCategories'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::check() && Auth::user()->role === 'admin') {
            $categories = Category::all();
            return view('admin.create', compact('categories'));
        }

        return redirect('/');
    }

    public function store()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::check() && Auth::user()->role === 'user') {
            return redirect('/');
        }
        // authorize
        request()->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'new_category' => ['nullable', 'max:255']
        ]);

        $category_id = request()->category_id;

        if (!request()->category_id && request()->filled('new_category')) {
            // Create the new category
            $category = Category::create([
                'name' => request()->new_category,
            ]);

            // Use the new category's ID for the product
            $category_id = $category->id;
        }
        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => $category_id,
        ]);
        return redirect('/admin/products');
    }

    public function edit(Product $product)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::check() && Auth::user()->role === 'admin') {
            $categories = Category::all();
            return view('admin.edit', ['product' => $product, 'categories' => $categories]);
        }
        return redirect('/');
    }

    public function update(Product $product)
    {
        // authorize
        request()->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'new_category' => ['nullable', 'max:255']
        ]);

        $category_id = request()->category_id;

        if (!request()->category_id && request()->filled('new_category')) {
            // Create the new category
            $category = Category::create([
                'name' => request()->new_category,
            ]);

            // Use the new category's ID for the product
            $category_id = $category->id;
        }
        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => $category_id,
        ]);

        return redirect('/admin/products');
    }

    public function delete(Product $product)
    {
        // authorize
        $product->delete();
        return redirect('/admin/products');
    }


    // Users
    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function userdelete(User $user)
    {
        $user->delete();
        return redirect('/admin/users');
    }
}
