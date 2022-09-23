<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";
$path =  $_SERVER["PATH_INFO"] ?? null;
$base_uri = 'https://api.thecatapi.com/';
$api_path = $path == null ? 'v1/images/search' : 'v1/images/search' . '/?category_ids='.substr($path, 1, strlen($path)-1);
$template_path = "templates/template.mytpl";
$client_settings = [
    'base_uri' => $base_uri,
    'timeout' => 2.0,
];

require_once $autoloadPath;

use App\Tools\CatsGallery;
use App\Tools\TemplateEngine;

$gallery = new CatsGallery($client_settings, $api_path);
$template_engine = new TemplateEngine();
try
{
    $cat_url = $gallery->getRandomUrl();
    $html_output = $template_engine->render($template_path, ["cat_url"=>$cat_url]);
    echo $html_output;
}catch(Throwable $e){
    echo $e->getMessage();
}




