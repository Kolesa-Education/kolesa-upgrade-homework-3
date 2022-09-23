<?php

use GuzzleHttp\Client;
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
require_once $autoloadPath;

function getPic()
{
    $category = $_GET['category_ids'] ?? null;

    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com/',
        'timeout' => 2.0,
        'verify' => false,
    ]);

    if (!isset($category)) {
        $addUri = 'v1/images/search';
    } else {
        $addUri = 'v1/images/search?category_ids=' . $category;
    }

    try {
        $response = $client->get(uri: $addUri);
        $result = json_decode($response->getBody()->getContents(), associative: true);
        if (empty($result)) {
            return ["Неправильная категория", '<h1>Такой категории не существует. Попробуйте другой запрос.<h1>'];
        } else {
            return $result[0]['url'];
        }
    } catch (Exception $error) {
        /*  ToDo: здесь мы обрабатываем ошибку ловя разыне Exception'ы. Так как
            выдавать будем один общий ответ я по exception'ам не лазил. 
        */
        return [$error->getMessage(), '<h1>Проблемы с доступом к ресурсу. Повторите попытку позднее либо попробуйте другой запрос.<h1>'];
    }
}

// EOF