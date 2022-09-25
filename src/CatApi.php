<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client; 

class CatApi {
    public function getCatApi(){       
    
        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com/',
            'timeout' => 2.0,
            'verify' => false,
        ]);
        $response = $client->get('v1/images/search');
        $headers = get_headers('https://api.thecatapi.com/', 1);
        if ($headers[0] == 'HTTP/1.1 200 OK') {
            echo '<pre>';
            $result = json_decode($response->getBody()->getContents(), true);
            echo '<img src="' . $result[0]['url'] . '"width="500" height="500"/>';
        } else {
            echo 'Error';
        }  
    }
}