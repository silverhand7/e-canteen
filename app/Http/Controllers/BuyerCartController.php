<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyerCartController extends Controller
{
    public function index()
    {
        return Inertia::render('Cart', [
            'carts' => app(Cart::class)->getUserCart(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $buyerCarts = app(Cart::class)->getUserCart();
        $menuExists = false;
        foreach($buyerCarts as $cart) {
            if ($cart->menu_id == $request->menu_id) {
                $menuExists = true;
                $cart->qty += $request->qty;
                $cart->save();
            }
        }
        if ($menuExists == false) {
            Cart::create($request->toArray());
        }

        return app(Cart::class)->getUserCartTotal();
    }
}
