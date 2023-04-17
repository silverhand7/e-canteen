<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerLoginRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyerLoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login');
    }

    public function login(BuyerLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/');
    }
}
