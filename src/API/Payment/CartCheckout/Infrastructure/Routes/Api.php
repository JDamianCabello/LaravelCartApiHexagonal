<?php

use Illuminate\Support\Facades\Route;
use Src\API\Payment\CartCheckout\Infrastructure\Controllers\CartCheckoutController;


Route::post('/', CartCheckoutController::class)->name('get-checkout');
