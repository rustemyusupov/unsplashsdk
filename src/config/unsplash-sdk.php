<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Unsplash SDK Config
    |--------------------------------------------------------------------------
    |
    | Access Token is not expired and could be generated once
    | More details how to generate the access token can be found
    | here: https://unsplash.com/documentation#user-authentication
    |
    | Otherwise - we have to redirect user to login page
    */

    'client_id'     => env('UNSPLASH_CLIENT_ID'),
    'client_secret' => env('UNSPLASH_CLIENT_SECRET'),
    'redirect_uri'  => env('UNSPLASH_REDIRECT_URI'),

];
