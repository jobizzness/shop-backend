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
    //For authenticated users who want to modify their own data
    //like profile and so on...
    // also see their cart or purchases
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('user', 'User\UserController');
    });

    //Authenticated Admin only routes
    // Unsure about this one
    Route::middleware(['auth:api'])->prefix('admin')->group(function () {
        Route::resource('user', 'User\AdminUserController');
    });


    //Non authenticated routes change
    //TODO change auth middleware to public
    // Public routes are routes that dont require any form of authentication
    // meaning it's available to the public.
    // like to get the public information of a shop
    //Also auth routes are here
    Route::middleware(['api'])->group(function () {
        Route::post('auth:action', 'Auth\AuthController@index');
    });

    //This group requires some form of authenticaion,
    // like a public key or shop key. this is probably a request from a shop owner's website
    // and it is sent to us to perform requests on that shops data
    // like buying things adding to cart and so on
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('product', 'Shop\ShopController');
    });
});