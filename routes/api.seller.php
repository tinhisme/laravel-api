<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\Auth\SellerLoginController;
use App\Http\Controllers\Seller\Auth\RefreshTokenController;
use App\Http\Controllers\Seller\Auth\SellerLogoutController;
use App\Http\Controllers\Seller\Auth\SellerRegisterController;
use App\Http\Controllers\Seller\Auth\SellerVerifyEmailController;
use App\Http\Controllers\Seller\Auth\SellerResetPasswordController;
use App\Http\Controllers\Seller\Auth\SellerChangePasswordController;
use App\Http\Controllers\Seller\Auth\SellerForgotPasswordController;
use App\Http\Controllers\Seller\Category\SellerListCategoryController;
use App\Http\Controllers\Seller\Category\SellerListAttributeController;

Route::post('/register', [SellerRegisterController::class, 'handle']);
Route::post('/login', [SellerLoginController::class, 'handle']);
Route::get('/verify-email',[SellerVerifyEmailController::class , 'handle']);
Route::post('/forgot-password',[SellerForgotPasswordController::class , 'handle']);
Route::put('/reset-password',[SellerResetPasswordController::class , 'handle']);


Route::middleware(['auth:api', 'isSeller'])->group(function() {
    Route::post('/refresh-token', [RefreshTokenController::class, 'handle']);
    Route::get('/logout', [SellerLogoutController::class, 'handle']);
    Route::put('/change-password',[SellerChangePasswordController::class , 'handle']);

    Route::group(['prefix'=>'category'], function(){
        Route::get('/', [SellerListCategoryController::class, 'handle']);
        Route::get('/attribute', [SellerListAttributeController::class, 'handle']);

    });
});

