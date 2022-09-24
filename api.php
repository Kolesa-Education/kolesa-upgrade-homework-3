<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";

require_once $autoloadPath;

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.thecatapi.com/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);
$response = $client->get("v1/images/search");

$catJson = json_decode($response->getBody()->getContents(), true);

$catImage = $catJson[0]["url"];

$getCategory = $client->get("v1/categories");

$categJson = json_decode($getCategory->getBody()->getContents(), true);


















