<?php

namespace App;

use GuzzleHttp\Client;

class CatApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.thecatapi.com',
            'timeout' => 1
        ]);
    }

    public function getUrlRandCatImg(): string
    {
        $params = json_decode($this->client
            ->request('GET', '/v1/images/search')
            ->getBody(), true);

        return $params[0]['url'];
    }

    public function getCategoryCatsImg(): array
    {
        return json_decode($this->client
            ->request('GET', '/v1/categories')
            ->getBody(), true);
    }

    public function getCatImgByCategory(string $id): string
    {
        $params = json_decode($this->client
            ->request('GET', "/v1/images/search?category_ids={$id}")
            ->getBody(), true);

        return $params[0]['url'];
    }
}
