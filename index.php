<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фото котиков</title>
</head>
<body>
<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com',
    'timeout'  => 2.0,
]);

try {
    echo  "<h5>Выберите категорию:</h5>";

    $response = $client->request('GET', '/v1/categories');
    $contents = $response->getBody()->getContents();
    $jsonContent = json_decode($contents, true);

    foreach ($jsonContent as $jsonCategory) {
        echo  "<a href='/index.php?category_ids=" . $jsonCategory['id'] . "'>" . $jsonCategory['name'] . "</a><br>";
    }
    echo  "<a href='/index.php"."'>random cat</a><br>";
} catch (GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
} catch (GuzzleHttp\Exception\ServerException $e) {
    printf("Ошибка сервера: %s", $e->getMessage());
} catch (\Exception $e) {
    echo "Ошибка";
}

$category = $_GET['category_ids']??null;

try {
    if (!isset($category)) {
        $response = $client->request('GET', '/v1/images/search');
    } else {
        $category = $_GET['category_ids'];
        $response = $client->request('GET', '/v1/images/search?category_ids=' . $category);
    }

    $contents = $response->getBody()->getContents();
    $jsonContent = json_decode($contents, true);
    $url = $jsonContent[0]['url'];

    echo '<img src=' . $url . ' alt="random_cat" style="max-width:300px; max-height:300px">';

} catch (GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
} catch (GuzzleHttp\Exception\ServerException $e) {
    printf("Ошибка сервера: %s", $e->getMessage());
} catch (\Exception $e) {
    echo "Ошибка";
}


?>
</body>
</html>
