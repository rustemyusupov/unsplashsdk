<?php

namespace ryusupov\unsplashsdk;

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Support\ServiceProvider;

class UnsplashSDKServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('RYusupov\UnsplashSDK\HTTP\Controllers\AuthController');
        $this->app->make('RYusupov\UnsplashSDK\HTTP\Controllers\UserController');
        $this->app->make('RYusupov\UnsplashSDK\HTTP\Controllers\PhotoController');
        $this->app->make('RYusupov\UnsplashSDK\HTTP\Controllers\CollectionController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/unsplash-sdk.php' => config_path('unsplash-sdk.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/unsplash.php');
    }
}
