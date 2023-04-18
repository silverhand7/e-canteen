<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BuyerRegisterController extends Controller
{
    public function form()
    {
        return Inertia::render('Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:buyers'],
            'name' => ['required'],
            'jabatan' => ['max:255'],
            'password' => ['required']
        ]);
        $input = $request->toArray();
        $input['password'] = bcrypt($input['password']);

        $buyer = Buyer::create($input);

        Auth::guard('buyer')->login($buyer);

        return redirect('/')->with('success', 'Register berhasil.');
    }
}
