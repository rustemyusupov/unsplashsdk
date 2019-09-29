<?php

namespace RYusupov\UnsplashSDK;

use GuzzleHttp\Client;

/**
 * Class SDK
 * @package RYusupov\UnsplashSDK
 */
class SDK
{
    /**
     * Base API URL
     */
    const BASE_API_URL = 'https://api.unsplash.com';

    /**
     * @var Client
     */
    protected $apiClient;

    /**
     * @var array
     */
    private $components = [];

    /**
     * SDK constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->apiClient = new Client([
            'base_uri' => self::BASE_API_URL,
            'headers'  => [
                'Authorization' => "Bearer {$token}"
            ]
        ]);
    }

    /**
     * Getting component by name
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->getComponent($name);
    }

    /**
     * Initializes and returns component.
     *
     * @param string $name
     * @return mixed
     */
    private function getComponent($name)
    {
        if (!isset($this->components[$name])) {
            $componentClassName = 'RYusupov\\UnsplashSDK\\' . ucfirst($name);
            $this->components[$name] = new $componentClassName($this->apiClient);
        }

        return $this->components[$name];
    }
}
