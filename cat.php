<?php
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
require './vendor/autoload.php';



$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.thecatapi.com',
    // You can set any number of default request options.
    'timeout'  => 2.0,

]);

try {
    $response = $client->request('GET', '/v1/images/search');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo Psr7\Message::toString($e->getResponse());
    return;
}

$code = $response->getStatusCode(); // 200
if ($code==200){
    $reason = $response->getReasonPhrase(); // OK
    $body=$response->getBody();

    $input= json_decode( $body, TRUE );



    foreach ($input as $key=>$value) {
        $id=$value['id'];
        $url=$value['url'];
        $width=$value['width'];
        $height=$value['height'];
    }

    echo "<div class='col-md-4' id='".$id."'>";
    echo "<img class='card-img-top' src='".$url."' alt='image' style='height: '".$height."'px; width: '".$width."'px; object-fit: contain;'>";
    echo "<div>";


}else{
    echo "<div>'Status code'.$code<div>";
}




