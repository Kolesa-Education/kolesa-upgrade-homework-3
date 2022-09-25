<?php

require_once("index.php");
require_once $autoloadPath;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class CatsBreeds extends CatsUrl
{
    public $searchField = "id";
    public function getJsonUrl(): string
    {
        if (isset($_GET["breed"]) && $_GET["breed"]) {
            $breedsId = $this->getSearchArray();
            $catBreed = $_GET["breed"];
            
            return "https://api.thecatapi.com/v1/images/search?breed_ids=" . $breedsId[$catBreed];
        } else {
            return "https://api.thecatapi.com/v1/images/search";
        }
    }

    public function getBreedJson(): array
    {
        $client = new Client();
        try {
            $client->get($this->getJsonUrl());
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            echo "Сервис недоступен";
            die();
        }
        $request = new Request('GET', $this->getJsonUrl());
        $response = $client->send($request);
        $response_body = (string)$response->getBody();
        return json_decode($response_body, true);
    }

    function getImageUrl() :string
    {
        $imageUrl = $this->getBreedJson();
        return $imageUrl[0]["url"];
    }
}
