<?php

namespace RYusupov\UnsplashSDK\HTTP\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RYusupov\UnsplashSDK\Auth;

/**
 * Class AuthController
 * @package RYusupov\UnsplashSDK\HTTP\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var Auth
     */
    private $auth;

    /**
     * AuthController constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Action login to Unsplash
     * @return RedirectResponse
     */
    public function login(): RedirectResponse
    {
        return redirect($this->auth->getLoginUrl());
    }

    /**
     * Callback action for the retrieving code and perform authorization
     *
     * @param Request $request
     * @return array|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $accessToken = $this->auth->handleCallback($request->all());

        if ($accessToken) {
            $request->session()->put('access_token', $accessToken);

            return redirect(route('unsplash.me'));
        }

        return [
            'error' => 'Something wrong with authorization.'
        ];
    }
}
