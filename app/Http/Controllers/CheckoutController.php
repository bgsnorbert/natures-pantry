<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);

        // If the cart is empty, redirect to the cart page
        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'address' => 'required|max:255',
            'phone' => 'required|max:15',
        ]);

        // Get the cart from the session
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        // Save the order in the database
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $order->status = 'pending';  // Status could be 'pending' until the cash is delivered
        $order->payment_method = 'cash_on_delivery';  // Specify the payment method
        $order->save();

        // Save each cart item as an order item
        foreach ($cart as $id => $item) {
            $order->orderItems()->create([
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart
        Session::forget('cart');

        // Redirect to a thank you page or order summary
        return redirect('/thankyou')->with('success', 'Your order has been placed! Cash on delivery.');
    }
}
