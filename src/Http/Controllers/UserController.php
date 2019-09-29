<?php

namespace RYusupov\UnsplashSDK\HTTP\Controllers;

/**
 * Class UserController
 * @package RYusupov\UnsplashSDK\HTTP\Controllers
 */
class UserController extends BaseController
{
    /**
     * Action for the getting current user information
     * @return mixed
     */
    public function me()
    {
        return $this->sdk->user->getCurrentUserInfo();
    }
}
