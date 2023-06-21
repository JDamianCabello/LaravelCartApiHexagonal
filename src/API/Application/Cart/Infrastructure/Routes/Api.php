<?php

use Illuminate\Support\Facades\Route;
use Src\API\Application\Cart\Infrastructure\Controllers\GetUserCartController;
use Src\API\Application\Cart\Infrastructure\Controllers\StoreCartItemController;

Route::get('addCartItem', GetUserCartController::class)->name('get-cart');
Route::post('addCartItem', StoreCartItemController::class)->name('add-cart-item');
