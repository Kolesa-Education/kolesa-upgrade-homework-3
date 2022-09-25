<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client as Client;


$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/v1/images/',
    'timeout'  => '2.0'
]);

$response = $client->get('search');
$getBody = json_decode($response->getBody());
$getUrlFromArray = $getBody[0];
$url = $getUrlFromArray->url;

//print_r($url);

echo <<<HTML
<html>
    <body>
    <h1>Cat homework</h1>
    <br>
    <p><img src=$url alt="тут должен быть кот"></p>
    </body>
</html>
HTML;

?>
