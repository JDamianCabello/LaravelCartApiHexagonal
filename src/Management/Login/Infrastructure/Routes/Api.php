<?php

use Illuminate\Support\Facades\Route;
use Src\Management\Login\Infrastructure\Controllers\LoginAuthController;

Route::get('/', LoginAuthController::class);