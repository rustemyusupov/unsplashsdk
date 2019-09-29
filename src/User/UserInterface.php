<?php

namespace RYusupov\UnsplashSDK;

/**
 * Interface UserInterface
 * @package RYusupov\UnsplashSDK
 */
interface UserInterface
{
    /**
     * Get current user information
     * @return array
     */
    public function getCurrentUserInfo() : array;
}
