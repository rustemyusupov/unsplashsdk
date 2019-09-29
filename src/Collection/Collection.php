<?php

namespace RYusupov\UnsplashSDK;

/**
 * Class Collection
 * @package RYusupov\UnsplashSDK
 */
class Collection extends BaseComponent implements CollectionInterface
{
    /**
     * Base URL for collections
     */
    const URL_COLLECTIONS = '/collections';

    /**
     * Get collections
     *
     * @param array $params
     * @return array
     */
    public function getCollections(array $params = []): array
    {
        $body = $this->prepareListParams($params);

        return $this->sendRequest(self::URL_COLLECTIONS, self::GET, $body);
    }
}
