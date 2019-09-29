<?php

namespace RYusupov\UnsplashSDK;

/**
 * Class User
 * @package RYusupov\UnsplashSDK
 */
class User extends BaseComponent implements UserInterface
{
    /**
     * URL for the getting information about current user
     */
    const URL_ME = '/me';

    /**
     * Get current user information
     *
     * @return array
     */
    public function getCurrentUserInfo(): array
    {
        return $this->sendRequest(self::URL_ME);
    }
}
