<?php

namespace RYusupov\UnsplashSDK\HTTP\Controllers;

/**
 * Class PhotoController
 * @package RYusupov\UnsplashSDK\HTTP\Controllers
 */
class PhotoController extends BaseController
{
    /**
     * Action for the getting public photos
     * @return array
     */
    public function all()
    {
        return $this->sdk->photo->getPhotos();
    }
}
