<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

function get_url($param) {
    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com/v1/',
        'timeout' => 2.0,
    ]);
    $additional_uri = '';
    $category = '';
    if (isset($param['category'])) {
        $category = $param['category'];
        switch ($category){
        case '1':
            $additional_uri = 'images/search?category_ids=1';
            break;

        case '2':
            $additional_uri = 'images/search?category_ids=2';
            break;

        case '3':
            $additional_uri = 'images/search?category_ids=3';
            break;

        case '4':
            $additional_uri = 'images/search?category_ids=4';
            break;

        case '5':
            $additional_uri = 'images/search?category_ids=5';
            break;

        case '6':
            $additional_uri = 'images/search?category_ids=6';
            break;

        case '7':
            $additional_uri = 'images/search?category_ids=7';
            break;

        case '9':
            $additional_uri = 'images/search?category_ids=9';
            break;

        case '10':
            $additional_uri = 'images/search?category_ids=10';
            break;

        case '14':
            $additional_uri = 'images/search?category_ids=14';
            break;

        case '15':
            $additional_uri = 'images/search?category_ids=15';
            break;
        
        default:
            break;
        }
    }

    $response = $client->request('GET', $additional_uri);
    $image_url = $response->getBody()->getContents();
    return json_decode($image_url, true)[0]['url'];
}

// EOF
