<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyerCheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('Checkout', [
            'carts' => app(Cart::class)->getUserCart(),
            'bank_name' => env('BANK_NAME'),
            'bank' => env('BANK'),
            'bank_rekening' => env('BANK_REKENING'),
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'proof_of_payment' => ['required']
        ]);

        $fileName = $request->file('proof_of_payment')->store('proof_of_payment');

        $orderDetails = collect($request->order_details)->map(function($item) {
            $item['total'] = $item['price'] * $item['qty'];
            return $item;
        });

        $order = Order::create([
            'buyer_id' => auth()->guard('buyer')->user()->id,
            'proof_of_payment' => $fileName,
            'total' => $orderDetails->sum('total'),
            'status' => 'paid',
            'note' => $request->note,
        ]);

        $orderDetails = $orderDetails->map(function($item) use($order){
            $data['order_id'] = $order->id;
            $data['menu_id'] = $item['menu_id'];
            $data['qty'] = $item['qty'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            return $data;
        })->toArray();

        OrderDetail::insert($orderDetails);

        Cart::where('buyer_id', auth()->guard('buyer')->user()->id)->delete();

        return redirect('/')->with('success', 'Berhasil melakukan checkout, kami akan segera memproses pesanan anda.');
    }
}
