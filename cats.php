<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/v1/images/',
    'timeout'  => 2.0,
]);

function getCatUrl($client) {
try {
    $response = $client->get('search');   
} catch (GuzzleHttp\Exception\ClientException $e) {
    $response = $e->getResponse();
    // return "Picture not found!";
    exit("Picture not found!");
}
    $bodyArray = json_decode($response->getBody());
    if (!array_key_exists(0, $bodyArray)) {
        exit("Invalid JSON");
    }
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
