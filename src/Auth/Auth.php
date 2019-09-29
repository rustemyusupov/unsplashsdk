<?php

namespace RYusupov\UnsplashSDK;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

/**
 * Class Auth
 * @package RYusupov\UnsplashSDK
 */
class Auth implements AuthInterface
{
    /**
     * URL for login redirect
     */
    const URL_LOGIN = 'https://unsplash.com/oauth/authorize';
    const URL_TOKEN = 'https://unsplash.com/oauth/token';

    private $httpClient;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * Create login url
     *
     * @return string
     */
    public function getLoginUrl(): string
    {
        $loginParams = [
            'client_id'     => config('unsplash-sdk.client_id'),
            'redirect_uri'  => config('unsplash-sdk.redirect_uri'),
            'response_type' => 'code',
            'scope'         => 'public read_user',
        ];

        return self::URL_LOGIN . '?' . http_build_query($loginParams);
    }

    /**
     * Handle callback from Unsplash
     *
     * @param array $params
     * @return string|null
     */
    public function handleCallback(array $params): ?string
    {
        try {
            $response = $this->httpClient
                ->post(self::URL_TOKEN, [
                    'form_params' => [
                        'client_id'     => config('unsplash-sdk.client_id'),
                        'client_secret' => config('unsplash-sdk.client_secret'),
                        'redirect_uri'  => config('unsplash-sdk.redirect_uri'),
                        'code'          => Arr::get($params, 'code'),
                        'grant_type'    => 'authorization_code',
                    ]
                ])
                ->getBody()
                ->getContents();

            return Arr::get(json_decode($response, true), 'access_token');
        } catch (\Exception $e) {
            return null;
        }
    }
}
