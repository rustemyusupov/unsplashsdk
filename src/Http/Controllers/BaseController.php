<?php

namespace RYusupov\UnsplashSDK\HTTP\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RYusupov\UnsplashSDK\SDK;

/**
 * Class BaseController
 * @package RYusupov\UnsplashSDK\HTTP\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var SDK
     */
    protected $sdk;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            if ($token = $request->session()->get('access_token')) {
                $this->sdk = new SDK($token);
            }

            return $next($request);
        });
    }
}
