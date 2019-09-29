## Unsplash SDK

This package provides ability to use Unsplash REST API in Laravel application.

## Installation guide
This package uses environment variables

- `UNSPLASH_CLIENT_ID` - Unsplash app Client ID
- `UNSPLASH_CLIENT_SECRET` - Unsplash app Client Secret
- `UNSPLASH_REDIRECT_URI` - Unsplash app callback URI for the handling redirects after login

Package should be added in composer file:

```json
"require": {
    .......
    "ryusupov/unsplashsdk": "master"
},

"repositories":[
    {
        "type": "git",
        "url": "git@github.com:rustemyusupov/unsplashsdk.git"
    }
]
```

Add new service provider to the application;

```php
/*
 * Package Service Providers...
 */
RYusupov\UnsplashSDK\UnsplashSDKServiceProvider::class,
```
Publish Laravel vendors: config file (`unsplash-sdk.php`) and predefined routes and controllers will be published

```php
php artisan vendor:publish
```

For the demo please use predefined routes which will be published with `UnsplashSDKServiceProvider`

- `/unsplash/login` - Login, user will be redirected to Unsplash login page and redirected back if login was passed
- `/unsplash/me` - Page with the printed current user info
- `/unsplash/photos` - Page with the printed photos (1 page with 10 items by default)
- `/unsplash/collections` - Page with the printed collection (1 page with 10 items by default)
