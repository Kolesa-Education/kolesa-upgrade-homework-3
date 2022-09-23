<?php

namespace App\Tools;

use ErrorException;
use GuzzleHttp\Client;

class CatsGallery{
    private Client $client;
    private string $apiPath;

    function __construct(array $clientSettings, string $apiPath)
    {
        $this->setClient(new Client($clientSettings));
        $this->setApiPath($apiPath);
    }

    function getRandomUrl():string | null
    {
        $response = $this->client->get($this->apiPath);
        $contentJson = json_decode($response->getBody()->getContents(), true)[0] ?? null;
        $catUrl = $contentJson['url'] ?? null;
        if(is_null($catUrl))throw new ErrorException("Something wrong with url");
        return $catUrl;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function setApiPath(string $apiPath): self
    {
        $this->apiPath = $apiPath;

        return $this;
    }
}