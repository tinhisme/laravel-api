<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserLogoutController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\Auth\UserVerifyEmailController;
use App\Http\Controllers\User\Auth\UserResetPasswordController;
use App\Http\Controllers\User\Auth\UserChangePasswordController;
use App\Http\Controllers\User\Auth\UserForgotPasswordController;
use App\Http\Controllers\User\Category\UserListCategoryController;

Route::post('/register', [UserRegisterController::class, 'handle']);
Route::post('/login', [UserLoginController::class, 'handle']);
Route::get('/verify-email',[UserVerifyEmailController::class , 'handle']);
Route::post('/forgot-password',[UserForgotPasswordController::class , 'handle']);
Route::put('/reset-password',[UserResetPasswordController::class , 'handle']);
Route::post('/refresh-token', [RefreshTokenController::class, 'handle']);


Route::middleware(['auth:api', 'isUser'])->group(function() {
    Route::get('/logout', [UserLogoutController::class, 'handle']);
    Route::put('/change-password',[UserChangePasswordController::class , 'handle']);

    Route::group(['prefix'=>'category'], function(){
        Route::get('/', [UserListCategoryController::class, 'handle']);
    });
});