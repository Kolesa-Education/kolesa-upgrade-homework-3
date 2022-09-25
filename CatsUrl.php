<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";

require_once $autoloadPath;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;




class CatsUrl 
{
    
    
    public function getFullJson():array
    {
        $client = new Client();

        $request = new Request('GET', "https://api.thecatapi.com/v1/images/search");
        $response = $client->send($request);
        $response_body = (string)$response->getBody();
        return json_decode($response_body, true); 
    }

    public function getCatImage():string
    {
        $getJson = $this->getFullJson();
        $imageUrl = $getJson[0]["url"];
        return $imageUrl;

    }

    public function getBreeds():array
    {
        $client = new Client();

        $request = new Request('GET', "https://api.thecatapi.com/v1/breeds");
        $response = $client->send($request);
        $response_body = (string)$response->getBody();
        return json_decode($response_body, true); 
    }
    public function getSearchArray(): array
    {
        $breedsId = [];
        
        $searchField = "id";
        $searchNames = $this->getBreeds();
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

    























