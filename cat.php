<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

function get_img_url($post)
{
    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com/v1/',
        'timeout' => 5.0,
    ]);
    $uri = 'images/search';
    $category = '';
    if (isset($post['category'])){
        $category = $post['category'];
    }
    switch ($category){
        case '5':
            $uri .= '?category_ids=5';
            break;
        case '15':
            $uri .= '?category_ids=15';
            break;
        case '2':
            $uri .= '?category_ids=2';
            break;
        case '1':
            $uri .= '?category_ids=1';
            break;
        case '14':
            $uri .= '?category_ids=14';
            break;
        case '4':
            $uri .= '?category_ids=4';
            break;
        case '7':
            $uri .= '?category_ids=7';
            break;
        default:
            break;
    }
    try {
        $response = $client->request('GET', $uri);
        $content = $response->getBody()->getContents();

        return json_decode($content,true)[0]['url'];
    }catch (\GuzzleHttp\Exception\GuzzleException $e) {
        $response = $e->getResponse();
        return "Server Error";
    }
}
