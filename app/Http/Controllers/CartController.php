<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        // Display cart contents
        $cart = Session::get('cart', []);

        return view('cart.index', ['cart' => $cart]);
    }

    public function add(Request $request, Product $product)
    {
        // Validate the quantity input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Get cart from session or create a new one
        $cart = Session::get('cart', []);

        // Get the quantity from the form input
        $quantity = $request->input('quantity');

        // Add or update product in cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity
            ];
        }

        // Update session cart
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        Session::forget('cart');

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'You need to login to proceed to checkout.');
        }

        // Proceed to checkout
        return view('cart.checkout');
    }
}
