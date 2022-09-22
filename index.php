<?php

$autoloadPath = __DIR__ . "/vendor/autoload.php";

require_once $autoloadPath;
require_once 'tools.php';
require_once 'settings.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => $base_uri,
    'timeout' => 2.0,
]);

$content = $client->get($api_path);
$content_json = json_decode($content->getBody()->getContents(), true)[0] ?? null;

$cat_url = $content_json['url'] ?? null;

echo is_null($cat_url) ? "Wrong address" : template('template.php', ['cat_url' => $cat_url]);
