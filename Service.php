<?php

use GuzzleHttp\Client;

class Service
{
    private $client;

    public function serviceInitialization() {
        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com/',
            'timeout' => 2.0,
            'verify' => false,
        ]);

        $this->client = $client;
    }

    public function getCategory() {
        $response = $this->client->get(uri: 'v1/categories');
        $array = json_decode($response->getBody()->getContents(), associative: true);
        asort($array);
        foreach ($array as $category) {
            echo '<tr> <th>' . $category["id"] . ' </th> <th>' . $category["name"] . ' </th> </tr> ' . PHP_EOL;
        }
    }

    public function getPicture() {
        $category = $_GET['category_ids'] ?? null;
        if (!isset($category)) {
            $additionalAddress = 'v1/images/search';
        } else {
            $additionalAddress = 'v1/images/search?category_ids=' . $category;
        }
        try {
            $response = $this->client->get(uri: $additionalAddress);
            $array = json_decode($response->getBody()->getContents(), true);
            if (empty($array)) {
                echo "<h1>Error! Incorrect category has been choosing, try another one.<h1>";
            } else {
                echo '<img src="' . $array[0]['url'] . '" width="800" height="600"/>';
            }
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}