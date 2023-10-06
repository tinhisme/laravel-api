<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Auth',
], function () {
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController');
    Route::get('/verify-email','VerifyEmailController');
    Route::post('/forgot-password','ForgotPasswordController');
    Route::put('/reset-password','ResetPasswordController');
});

Route::group([
    'middleware' => ['auth:api'],
], function () {
    Route::group([
        'namespace' => 'App\Http\Controllers\Auth',
    ], function () {
        Route::post('/refresh-token', 'RefreshTokenController');
        Route::get('/logout', 'LogoutController');
        Route::get('/me', 'GetMeController');
    });


});

    Route::group([
        'namespace' => 'App\Http\Controllers\Category',
        'prefix' => 'category',
    ], function () {
        Route::post('/', 'CreateCategoryController');
        Route::get('/', 'ListCategoryController');
        Route::put('/', 'UpdateCategoryController');
        Route::delete('/', 'DeleteCategoryController');

        Route::post('/attribute-type', 'CreateAttributeTypeController');
        Route::post('/attribute-value', 'CreateAttributeValueController');
        Route::post('/attribute', 'CreateAttributeController');

        Route::get('/attribute', 'ListAttributeController');
        Route::get('/attribute-type', 'ListAttributeTypeController');
    });
// });
