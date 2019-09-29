<?php

/*
|--------------------------------------------------------------------------
| Unsplash SDK Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('unsplash/login', 'RYusupov\UnsplashSDK\HTTP\Controllers\AuthController@login');

    Route::get('unsplash/callback', 'RYusupov\UnsplashSDK\HTTP\Controllers\AuthController@callback');

    Route::get('unsplash/me', 'RYusupov\UnsplashSDK\HTTP\Controllers\UserController@me')->name('unsplash.me');

    Route::get('unsplash/photos', 'RYusupov\UnsplashSDK\HTTP\Controllers\PhotoController@all');

    Route::get('unsplash/collections', 'RYusupov\UnsplashSDK\HTTP\Controllers\CollectionController@all');
});


