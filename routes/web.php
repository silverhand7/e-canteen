<?php

use App\Http\Controllers\BuyerLoginController;
use App\Http\Controllers\BuyerRegisterController;
use App\Http\Controllers\Cashier\LoginController as CashierLoginController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get(config('nova')['path'].'/redirect/order/{id}', [CustomOrderController::class, 'updateTotal'])->name('order.update.total');
Route::get(config('nova')['path'].'/redirect/order-detail/{id}', [CustomOrderController::class, 'updateTotalFromOrderDetail'])->name('order.update.total');

Route::post(config()->get('nova')['path'] . '/login', [CashierLoginController::class, 'authLogin']);

Route::get('/login', [BuyerLoginController::class, 'index'])->name('buyer.login');
Route::post('/login', [BuyerLoginController::class, 'login'])->name('buyer.login.post');
Route::post('/logout', [BuyerLoginController::class, 'logout'])->name('buyer.logout');

Route::get('/register', [BuyerRegisterController::class, 'form'])->name('buyer.register');
Route::post('/register', [BuyerRegisterController::class, 'register'])->name('buyer.register.post');