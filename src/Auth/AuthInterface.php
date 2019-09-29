<?php

namespace RYusupov\UnsplashSDK;

/**
 * Interface AuthInterface
 * @package RYusupov\UnsplashSDK
 */
interface AuthInterface
{
    /**
     * Create login url
     *
     * @return string
     */
    public function getLoginUrl(): string;

    /**
     * Handle callback from Unsplash
     *
     * @param array $params
     * @return string|null
     */
    public function handleCallback(array $params): ?string;
}
