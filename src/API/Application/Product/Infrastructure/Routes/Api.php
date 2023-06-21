<?php

use Illuminate\Support\Facades\Route;
use Src\API\Application\Product\Infrastructure\Controllers\ListProductsController;

Route::get('/', ListProductsController::class)->name('list-products');
