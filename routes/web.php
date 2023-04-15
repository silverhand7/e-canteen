<?php

use App\Http\Controllers\Cashier\LoginController as CashierLoginController;
use App\Http\Controllers\CustomOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(config('nova')['path'].'/redirect/order/{id}', [CustomOrderController::class, 'updateTotal'])->name('order.update.total');
Route::get(config('nova')['path'].'/redirect/order-detail/{id}', [CustomOrderController::class, 'updateTotalFromOrderDetail'])->name('order.update.total');


Route::post(config()->get('nova')['path'] . '/login', [CashierLoginController::class, 'authLogin']);