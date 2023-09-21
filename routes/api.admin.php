<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\Auth\RefreshTokenController;
use App\Http\Controllers\Admin\Category\AdminCreateCategoryController;
use App\Http\Controllers\Admin\Category\AdminListCategoryController;
use App\Http\Controllers\Admin\Category\AdminUpdateCategoryController;
use App\Http\Controllers\Admin\Category\AdminDeleteCategoryController;
use App\Http\Controllers\Admin\Category\AdminCreateAttributeTypeController;
use App\Http\Controllers\Admin\Category\AdminCreateAttributeController;
use App\Http\Controllers\Admin\Category\AdminListAttributeController;
use App\Http\Controllers\Admin\Category\AdminListAttributeTypeController;

Route::post('/login', [AdminLoginController::class, 'handle']);

Route::middleware(['auth:api', 'isAdmin'])->group(function() {
    Route::post('/refresh-token', [RefreshTokenController::class, 'handle']);
    Route::get('/logout', [AdminLogoutController::class, 'handle']);
   
    //CATEGORY
    Route::group(['prefix' => 'category'], function(){
        Route::post('/', [AdminCreateCategoryController::class, 'handle']);
        Route::get('/', [AdminListCategoryController::class, 'handle']);
        Route::put('/', [AdminUpdateCategoryController::class, 'handle']);
        Route::delete('/', [AdminDeleteCategoryController::class, 'handle']);

        // ATTRIBUTES
        Route::post('/attribute-type', [AdminCreateAttributeTypeController::class, 'handle']);
        Route::post('/attribute', [AdminCreateAttributeController::class, 'handle']);

        Route::get('/attribute', [AdminListAttributeController::class, 'handle']);
        Route::get('/attribute-type', [AdminListAttributeTypeController::class, 'handle']);

    });
});