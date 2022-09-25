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

    public function getURLRandImage(): string
    {

        try {
            $params = json_decode($this->client
                ->request('GET', '/v1/images/search')
                ->getBody(), true);
        } catch (\Exception) {
            return '';
        }

        return $params[0]['url'] ?? '';
    }

    public function getImageCategories(): array
    {
        try {
            return json_decode($this->client
                ->request('GET', '/v1/categories')
                ->getBody(), true);
        } catch (\Exception) {
            return [];
        }
    }

    public function getURLImageByCategory(string $categoryID): string
    {
        try {
            $params = json_decode($this->client
                ->request('GET', "/v1/images/search?category_ids={$categoryID}")
                ->getBody(), true);
        } catch (\Exception) {
            return '';
        }

        return $params[0]['url'] ?? '';
    }
}
