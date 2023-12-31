<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function(){
    if (session()->exists('user')) {
        return redirect('/home');
    }
    return view("login"); });
Route::post("/login", [AuthController::class, 'login'])->name('login');
Route::group(['middleware' => 'usersession'], function () {
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [ProductsController::class, 'index'])->name('home');
    Route::get('/addCartItem/{productID}', [ProductsController::class, 'addToCart'])->name('addCartItemWeb');
    Route::get('/deleteCartItem/{productID}', [ProductsController::class, 'deleteCartItem'])->name('deleteCartItemWeb');
    Route::get('/changeQuantity/{productID}', [ProductsController::class, 'changeQuantityCartItem'])->name('changeQuantityCartItemWeb');
    Route::get('/checkout', [ProductsController::class, 'checkout'])->name('checkoutWeb');
});
