<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/',
    'timeout' => 2.0,
]);

$response = $client->get('v1/images/search');

echo '<pre>';
$result = json_decode($response->getBody()->getContents(),true);
echo '<img src="' . $result[0]['url'] . '">';