<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";
require_once $autoloadPath;

use App\Tools\CatsGallery;
use App\Tools\TemplateEngine;

const BASE_URI = 'https://api.thecatapi.com/';
const TEMPLATE_PATH = "templates/template.mytpl";
const CLIENT_SETTINGS = [
    'base_uri' => BASE_URI,
    'timeout' => 2.0,
];

$path =  $_SERVER["PATH_INFO"] ?? null;
$apiPath = $path == null ? 'v1/images/search' : 'v1/images/search' . '/?category_ids='.substr($path, 1, strlen($path)-1);


$gallery = new CatsGallery(CLIENT_SETTINGS, $apiPath);
$templateEngine = new TemplateEngine();

try
{
    $catUrl = $gallery->getRandomUrl();
    $htmlOutput = $templateEngine->render(TEMPLATE_PATH, ["catUrl"=>$catUrl]);
    echo $htmlOutput;
}catch(Throwable $e){
    echo $e->getMessage();
}




