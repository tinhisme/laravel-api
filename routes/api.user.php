<?php

use App\Http\Controllers\User\Auth\UserChangePasswordController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\Auth\UserVerifyEmailController;
use App\Http\Controllers\User\Auth\UserForgotPasswordController;


Route::post('/register', [UserRegisterController::class, 'handle']);
Route::post('/login', [UserLoginController::class, 'handle']);
Route::get('/verify-email',[UserVerifyEmailController::class , 'handle']);
Route::post('/forgot-password',[UserForgotPasswordController::class , 'handle']);
Route::put('/reset-password',[UserResetPasswordController::class , 'handle']);
Route::put('/change-password',[UserChangePasswordController::class , 'handle']);