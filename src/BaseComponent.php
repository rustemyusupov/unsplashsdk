<?php

namespace RYusupov\UnsplashSDK;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

abstract class BaseComponent
{
    /**
     * Base HTTP methods
     */
    const GET  = 'GET';
    const POST = 'POST';

    /**
     * List of available order by filters
     */
    const ORDER_BY = [
        'latest',
        'oldest',
        'popular',
    ];

    /**
     * @var Client
     */
    protected $apiClient;

    public function __construct(Client $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Component name.
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->getComponent($name);
    }

    /**
     * Send http request to API
     *
     * @param string $url
     * @param string $method
     * @param array $body
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function sendRequest(string $url, string $method = self::GET, array $body = []): array
    {
        try {
            $response = $this->apiClient->request($method, $url, ['query' => $body])
                ->getBody()
                ->getContents();

            return json_decode($response, true);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Prepare pagination params
     *
     * @param array $params
     * @return array
     */
    protected function prepareListParams(array $params = []): array
    {
        $page    = Arr::get($params, 'page');
        $perPage = Arr::get($params, 'per_page');
        $orderBy = Arr::get($params, 'order_by');

        return [
            'page'     => $page > 0 ? $page : 1,
            'per_page' => $perPage > 0 ? $perPage : 10,
            'order_by' => in_array($orderBy, self::ORDER_BY) ? $orderBy : self::ORDER_BY[0],
        ];
    }
}
