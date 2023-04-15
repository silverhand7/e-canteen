<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function updateTotal($id)
    {
        $order = Order::findOrFail($id);
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->menu->price * $orderDetail->qty;
        }
        $order->total = $total;
        $order->save();
        return redirect()->route('nova.pages.detail', ['orders', $id]);
    }

    public function updateTotalFromOrderDetail($orderDetailId)
    {
        $order = OrderDetail::findOrFail($orderDetailId)->order;
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->menu->price * $orderDetail->qty;
        }
        $order->total = $total;
        $order->save();
        return redirect()->route('nova.pages.detail', ['orders', $order->id]);
    }
}
