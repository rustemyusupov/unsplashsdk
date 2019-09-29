<?php

namespace RYusupov\UnsplashSDK;

/**
 * Interface CollectionInterface
 * @package RYusupov\UnsplashSDK
 */
interface CollectionInterface
{
    /**
     * @param array $params
     * @return array
     */
    public function getCollections(array $params = []) : array;
}
