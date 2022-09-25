<?php

require_once "TheCatApi.php";
require_once "iGetImageUrl.php";
require __DIR__ . '\vendor\autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class CategoryByBreed extends TheCatApi implements IGetImageUrl
{
    public string $searchField = "id";


    public function getJsonUrl(): string
    {
        if (isset($_GET['Cats']) && $_GET['Cats'] !== "Choose your breed") {
            $breedsId = $this->getSearchArray();
            $catBreed = $_GET['Cats'];
            return 'https://api.thecatapi.com/v1/images/search?breed_ids=' . $breedsId[$catBreed];
        } else {
            return self::RANDOM_PIC;
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

