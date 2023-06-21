<?php

use Illuminate\Support\Facades\Route;
use Src\API\Management\Login\Infrastructure\Controllers\LoginAuthController;

Route::post('/', LoginAuthController::class)->name('api-login');
