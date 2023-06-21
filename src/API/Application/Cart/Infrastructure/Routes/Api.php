<?php

use Illuminate\Support\Facades\Route;
use Src\API\Application\Cart\Infrastructure\Controllers\ChangeItemQuantityController;
use Src\API\Application\Cart\Infrastructure\Controllers\DeleteCartItemController;
use Src\API\Application\Cart\Infrastructure\Controllers\GetUserCartController;
use Src\API\Application\Cart\Infrastructure\Controllers\StoreCartItemController;

Route::get('/', GetUserCartController::class)->name('get-cart');
Route::post('/', StoreCartItemController::class)->name('add-cart-item');
Route::delete('/', DeleteCartItemController::class)->name('delete-cart-item');
Route::put('/', ChangeItemQuantityController::class)->name('change-cart-item-quantity');
