<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
}
