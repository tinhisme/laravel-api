<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\Auth\RefreshTokenController;
use App\Http\Controllers\Admin\Category\AdminCreateCategoryController;
use App\Http\Controllers\Admin\Category\AdminListCategoryController;
use App\Http\Controllers\Admin\Category\AdminUpdateCategoryController;
use App\Http\Controllers\Admin\Category\AdminDeleteCategoryController;

Route::post('/login', [AdminLoginController::class, 'handle']);

Route::middleware(['auth:api', 'isAdmin'])->group(function() {
    Route::post('/refresh-token', [RefreshTokenController::class, 'handle']);
    Route::get('/logout', [AdminLogoutController::class, 'handle']);
   
    Route::group(['prefix'=>'category'], function(){
        Route::post('/', [AdminCreateCategoryController::class, 'handle']);
        Route::get('/', [AdminListCategoryController::class, 'handle']);
        Route::put('/', [AdminUpdateCategoryController::class, 'handle']);
        Route::delete('/', [AdminDeleteCategoryController::class, 'handle']);
    });
});