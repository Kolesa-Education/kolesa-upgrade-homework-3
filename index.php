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
<html><body><img src=$url/></body></html>
HTML;

?>
