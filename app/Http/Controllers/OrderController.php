<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders with related order items and products
        $orders = Order::with(['user', 'orderItems.product'])->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function updateStatus(Order $order)
    {
        $order->status = 'paid';
        $order->save();
        return redirect('/admin/orders');
    }
}
