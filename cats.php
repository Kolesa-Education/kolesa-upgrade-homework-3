<?php

$loader = __DIR__ . '/vendor/autoload.php';
require_once $loader;

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.thecatapi.com/v1/images/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

function getCatUrl($client) {
    $response = $client->get('search');
    $bodyArray = json_decode($response->getBody());
    $stdObj = $bodyArray[0];
    $url = $stdObj->url;
    return $url;
}

function generateCatHtmlBlock($url) {
    return <<<END
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="$url" alt="image" style="height: 225px; width: 100%; object-fit: contain;">
                </div>
            </div>
        END;
}


for ($i=1; $i <= 9; $i++) {
    $url = getCatUrl($client);
    echo generateCatHtmlBlock($url);
}
