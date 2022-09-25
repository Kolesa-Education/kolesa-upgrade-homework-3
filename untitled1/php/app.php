<?php
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

try {
    $cat_id = $_GET["category"];
    $client = new Client([
        'base_url' => 'https://api.thecatapi.com',
    ]);
    $params = [
        'query' => [
            'category_ids' => $cat_id
        ]
    ];
    $response = $client->request('GET','/v1/images/search', $params);
    $body = $response->getBody();
    $arr_body = json_decode($body);

    print_r('<html><body><img src="'.$arr_body['0']->url.'"/></body></html>');
} catch (GuzzleHttp\Exception\ClientException $e) {
    $response = $e->getResponse();
    $responseBodyAsStr = $response->getBody()->getContents();
    echo $responseBodyAsStr;
}