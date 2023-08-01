<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\User\Auth\UserVerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AdminLoginController::class, 'handle']);
Route::post('/refresh-token', [AdminLoginController::class, 'handle']);
