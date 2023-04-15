<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class LoginController extends \Laravel\Nova\Http\Controllers\LoginController
{
    public function authLogin(Request $request)
    {
        $request->request->add(['username' => $request->username]);

        return $this->login($request);
    }

    public function username()
    {
        return 'username';
    }

    public function redirectPath()
    {
        return Nova::url('/resources/cashiers');
    }
}