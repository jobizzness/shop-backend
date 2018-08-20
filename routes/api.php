<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function(){

    //Authenticated routes only
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('user', 'User\UserController');
    });

    //Authenticated Admin only routes
    Route::middleware(['auth:api'])->prefix('admin')->group(function () {
        Route::resource('user', 'User\AdminUserController');
    });


    //Non authenticated routes change
    //TODO change auth middleware to public
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('user', 'Shop\ShopController');
    });
});