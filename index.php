<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";
$path =  $_SERVER["PATH_INFO"] ?? null;
$base_uri = 'https://api.thecatapi.com/';
$api_path = $path == null ? 'v1/images/search' : 'v1/images/search' . '/?category_ids='.substr($path, 1, strlen($path)-1);

require_once $autoloadPath;
require_once 'template_engine.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => $base_uri,
    'timeout' => 2.0,
]);

$content = $client->get($api_path);
$content_json = json_decode($content->getBody()->getContents(), true)[0] ?? null;

$cat_url = $content_json['url'] ?? null;

echo is_null($cat_url) ? "404 Not Found" : template('templates/template.php', ['cat_url' => $cat_url]);
