<?php

namespace RYusupov\UnsplashSDK;

/**
 * Interface PhotoInterface
 * @package RYusupov\UnsplashSDK
 */
interface PhotoInterface
{
    /**
     * Get photos
     *
     * @param array $params
     * @return array
     */
    public function getPhotos(array $params = []) : array;
}
