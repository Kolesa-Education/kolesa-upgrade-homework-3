<?php

// Проверить работу можно тут - https://sitecodera.ru/demo/cats

require_once  __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client as Client;

$httpClient = new Client(['base_uri'=>'https://api.thecatapi.com/v1/images/search?limit=3']);
$response = $httpClient->request('GET');


$contents = $response->getBody();
$jsonContent = json_decode($contents, true);
//var_dump($jsonContent);

if (isset($jsonContent[0]['url'])) {
    $url = $jsonContent[0]['url'];
} else {
    echo "Сервер недоступен, попробуйте перезагрузить страницу.";
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Smolnikov</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>Cats</h1>
<form action="">
<input type="submit" value="Обновить">
</form>
<section>
<img src="<?=$url?>" style="max-width:600px; max-height:600px">
</section>

</body>
</html>
