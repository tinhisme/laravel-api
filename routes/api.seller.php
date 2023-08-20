<?php

use App\Http\Controllers\Seller\Auth\SellerChangePasswordController;
use App\Http\Controllers\Seller\Auth\SellerLoginController;
use App\Http\Controllers\Seller\Auth\SellerResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\Auth\SellerRegisterController;
use App\Http\Controllers\Seller\Auth\SellerVerifyEmailController;
use App\Http\Controllers\Seller\Auth\SellerForgotPasswordController;
use App\Http\Controllers\Seller\Auth\SellerLogoutController;

Route::post('/register', [SellerRegisterController::class, 'handle']);
Route::post('/login', [SellerLoginController::class, 'handle']);
Route::get('/verify-email',[SellerVerifyEmailController::class , 'handle']);
Route::post('/forgot-password',[SellerForgotPasswordController::class , 'handle']);
Route::put('/reset-password',[SellerResetPasswordController::class , 'handle']);


Route::middleware(['auth:api', 'isSeller'])->group(function() {
    Route::get('/logout', [SellerLogoutController::class, 'handle'])->middleware('auth:api');
    Route::put('/change-password',[SellerChangePasswordController::class , 'handle']);
});