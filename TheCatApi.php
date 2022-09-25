<?php

require __DIR__ . '\vendor\autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class TheCatApi
{

    public string $searchField;
    public const JSON_URL = 'https://api.thecatapi.com/v1/breeds';
    public const RANDOM_PIC = 'https://api.thecatapi.com/v1/images/search';


    public function getJson(): array
    {
        $client = new Client();
        try {
            $client->get(self::JSON_URL);
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            echo "Сервис недоступен";
            die();
        }
        $request = new Request('GET', self::JSON_URL);
        $response = $client->send($request);
        $response_body = (string)$response->getBody();
        return json_decode($response_body, true);
    }

    public function getSearchArray(): array // // with breed names as a keys
    {
        $breedsId = [];
        $searchField = $this->searchField;
        $searchNames = $this->getJson();
        $i = 0;
        foreach ($searchNames as $breed) {
            $breedsId[$searchNames[$i]["name"]] = $searchNames[$i][$searchField];
            $i++;
        }

        return $breedsId;
    }

    public function getBreedNames(): array
    {
        $breedsId = $this->getSearchArray();
        return array_keys($breedsId);
    }

}
