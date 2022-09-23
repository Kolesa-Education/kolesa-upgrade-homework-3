<?php

namespace App\Tools;

use ErrorException;
use GuzzleHttp\Client;

class CatsGallery{
    private Client $client;
    private string $api_path;

    function __construct(array $client_settings, string $api_path)
    {
        $this->setClient(new Client($client_settings));
        $this->setApiPath($api_path);
    }

    function getRandomUrl():string | null
    {
        $response = $this->client->get($this->api_path);
        $content_json = json_decode($response->getBody()->getContents(), true)[0] ?? null;
        $cat_url = $content_json['url'] ?? null;
        if(is_null($cat_url))throw new ErrorException("Something wrong with url");
        return $cat_url;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function setApiPath(string $api_path): self
    {
        $this->api_path = $api_path;

        return $this;
    }
}