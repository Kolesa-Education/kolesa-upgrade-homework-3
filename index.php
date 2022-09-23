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
use App\Tools\UnknownParametrException;

$gallery = new CatsGallery($client_settings, $api_path);
$cat_url = $gallery->getRandomUrl();
if(is_null($cat_url)){
    echo "404 Not Found";
    exit();
}

$template_engine = new TemplateEngine();
try
{
    $html_output = $template_engine->render($template_path, ["cat_url"=>$cat_url]);
    echo $html_output;
}catch(UnknownParametrException $e){
    echo "Template error";
}




