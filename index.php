<?php
/*
Насчёт вопроса в опциональных требованиях:

При взаимодействии с API могут произойти различные ошибки:
Мы вводим не правильный урл (Ошибки 4**)
Сервер недоступен (Ошибки 5**)
Обработать их можно в коде через условия или try catch
Сообщать о проблеме пользователю можно кастомным сообщением, или просто выводом сообщения и кода ошибки
*/

//Над этой строчкой кстати думал пол часа, пока не откопал видео индуса:)
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;

try {
$cat_id = $_GET["category"];
$client = new Client([
    'base_uri' => 'https://api.thecatapi.com',
]);
  
$params = [
    'query' => [
       'category_ids' => $cat_id
    ]
 ];
$response = $client->request('GET', '/v1/images/search', $params);
$body = $response->getBody();
$arr_body = json_decode($body);

print_r('<html><body><img src="'.$arr_body['0']->url.'"/></body></html>');
}
catch (GuzzleHttp\Exception\ClientException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    echo $responseBodyAsString;
}