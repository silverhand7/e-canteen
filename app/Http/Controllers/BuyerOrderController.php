<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyerOrderController extends Controller
{
    public function index()
    {
        return Inertia::render('Orders', [
            'orders' => Order::where('buyer_id', auth()->guard('buyer')->user()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return Inertia::render('OrderDetails', [
            'order' => $order,
            'order_details' => $order->orderDetails()->join('menus', 'menus.id', '=', 'order_details.menu_id')->get(),
        ]);
    }
}
