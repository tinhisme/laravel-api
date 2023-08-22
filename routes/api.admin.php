<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\Auth\RefreshTokenController;

Route::post('/login', [AdminLoginController::class, 'handle']);
Route::post('/refresh-token', [RefreshTokenController::class, 'handle']);
Route::get('/logout', [AdminLogoutController::class, 'handle']);
