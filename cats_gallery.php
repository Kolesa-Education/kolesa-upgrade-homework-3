<?php

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
        return $cat_url;
    }


    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getApiPath(): string
    {
        return $this->api_path;
    }

    public function setApiPath(string $api_path): self
    {
        $this->api_path = $api_path;

        return $this;
    }
}