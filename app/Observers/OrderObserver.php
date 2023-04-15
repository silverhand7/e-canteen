<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     */
    public function created(Order $order): void
    {
        // $total = 0;
        // dd($order->orderDetails);
        // foreach ($order->orderDetails as $orderDetail) {
        //     $total += $orderDetail->menu->price * $orderDetail->qty;
        // }

        // $order->total = $total;
        // $order->save();
    }

    /**
     * Handle the order "updated" event.
     */
    public function updated(Order $order): void
    {
        // $total = 0;
        // foreach ($order->orderDetails as $orderDetail) {
        //     $total += $orderDetail->menu->price * $orderDetail->qty;
        // }

        // $order->total = $total;
        // $order->save();
    }

    /**
     * Handle the order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
