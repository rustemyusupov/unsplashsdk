<?php

namespace RYusupov\UnsplashSDK;

/**
 * Class Photo
 * @package RYusupov\UnsplashSDK
 */
class Photo extends BaseComponent implements PhotoInterface
{
    /**
     * Base URL for the getting photos
     */
    const URL_PHOTOS = '/photos';

    /**
     * Get photos
     *
     * @param array $params
     * @return array
     */
    public function getPhotos(array $params = []): array
    {
        $body = $this->prepareListParams($params);

        return $this->sendRequest(self::URL_PHOTOS, self::GET, $body);
    }
}
