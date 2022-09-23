<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";
$path =  $_SERVER["PATH_INFO"] ?? null;
$base_uri = 'https://api.thecatapi.com/';
$api_path = $path == null ? 'v1/images/search' : 'v1/images/search' . '/?category_ids='.substr($path, 1, strlen($path)-1);
$template_path = "templates/template.mytpl";

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

$template_engine = new TemplateEngine();
echo $template_engine->render($template_path, ["cat_url"=>$cat_url]);




