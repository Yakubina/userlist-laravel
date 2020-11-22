<?php


namespace Userlist\Laravel;

use GuzzleHttp\Client;

class PushClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://push.userlist.com/',
            'defaults'  => [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => "Push {$this->config->get('push_key')}",
                    'Content-Type'  => 'application/json; charset=UTF-8'
                ]
            ]
        ]);
    }

    public function send($endpoint, $payload = [])
    {
        $this->client->request('POST', $endpoint, $payload);
    }
}
