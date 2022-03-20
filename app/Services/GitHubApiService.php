<?php

namespace App\Services;

use GuzzleHttp\Client;
use http\Client\Response;
use Psr\Http\Message\StreamInterface;

class GitHubApiService
{

    /**
     * function to get list of repository form gitHub API
     */
    public function getListRepository()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.github.com/repositories');
        return json_decode($response->getBody());
    }
}
