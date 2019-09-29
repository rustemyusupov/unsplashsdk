<?php

namespace RYusupov\UnsplashSDK\HTTP\Controllers;

/**
 * Class CollectionController
 * @package RYusupov\UnsplashSDK\HTTP\Controllers
 */
class CollectionController extends BaseController
{
    /**
     * Action for the getting collections
     * @return array
     */
    public function all()
    {
        return $this->sdk->collection->getCollections();
    }
}
