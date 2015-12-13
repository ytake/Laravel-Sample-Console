<?php

namespace Ytake\Laravel\SampleConsole\Client;

use GuzzleHttp\Client;

/**
 * Class Twitter
 */
class Twitter
{
    /** @var Client */
    protected $client;

    /**
     * Twitter constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $consumerKey
     * @param $consumerSecret
     *
     * @return \stdClass
     */
    public function getCredential($consumerKey, $consumerSecret)
    {
        $token = base64_encode(urlencode($consumerKey) . ':' . urlencode($consumerSecret));

        $response = $this->client->request('POST', "https://api.twitter.com/oauth2/token/", [
            'verify' => false,
            'headers' => [
                "Host" => "api.twitter.com",
                "User-Agent" => "Artisan Console Application",
                "Authorization" => "Basic " . $token,
                "Content-Type" => "application/x-www-form-urlencoded;charset=UTF-8",
                "Content-Length" => "29",
            ],
            'form_params' => [
                "grant_type" => "client_credentials"
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param $token
     * @param $account
     *
     * @return \stdClass
     */
    public function getTimeLine($token, $account)
    {
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name={$account}&count=5";
        $response = $this->client->request('GET', $url, [
            'verify' => false,
            'headers' => [
                "Host" => "api.twitter.com",
                "User-Agent" => "Artisan Console Application",
                "Authorization" => "Bearer " . $token,
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }
}
