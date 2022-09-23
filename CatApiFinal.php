<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

//создаю новый instance для получения Json всех пород кошек
$clientGetBreedsJson = new Client();
//Пример обработки ошибки в случае если ссылка недоступна
try {
    $clientGetBreedsJson->get('https://api.thecatapi.com/v1/breeds');
}
catch (GuzzleHttp\Exception\ClientException $e) {
   echo "Сервис недоступен";
   die();
}
//Получаю Json со всеми породами
$requestGetBreedsJson = new Request('GET', 'https://api.thecatapi.com/v1/breeds');
$responseGetBreedsJson = $clientGetBreedsJson->send($requestGetBreedsJson);
$response_bodyGetBreedsJson = (string)$responseGetBreedsJson->getBody();

//Распаковываю Json в виде массива
$breedUrl = json_decode($response_bodyGetBreedsJson, true);

//Создаю массив и заполняю его всеми id кошек с ключами по названию породы
$breedsId = [];
$i = 0;
foreach ($breedUrl as $breed) {
    $breedsId[$breedUrl[$i]["name"]] = $breedUrl[$i]["id"];
    $i++;
}

//Получаю только название пород кошек, чтобы в дальнейшем создать выпадающий список
$breedNames = array_keys($breedsId);

//Использую ссылку на получения случайной фотографии, в случае если $_GET['Cats'] не установлен
$linkToGetJson = 'https://api.thecatapi.com/v1/images/search';

// возвращаю переработнную ссылку с учетом выбора породы
if (isset($_GET['Cats']) && $_GET['Cats'] !== "Choose your breed") {
    $catBreed = $_GET['Cats'];
    $linkToGetJson = 'https://api.thecatapi.com/v1/images/search?breed_ids=' . $breedsId[$catBreed];
}

//Создаю новый Instance для получения Json на картинку определнной породы
$clientGetLinkToBreed = new Client();

try {
    $clientGetLinkToBreed->get($linkToGetJson);
}
catch (GuzzleHttp\Exception\ClientException $e) {
    echo "Сервис недоступен";
    die();
}

//Получаю Json для картинки определенной породы
$requestGetLinkToBreed = new Request('GET', $linkToGetJson);
$responseGetLinkToBreed = $clientGetLinkToBreed->send($requestGetLinkToBreed);
$response_bodyGetLinkToBreed = (string)$responseGetLinkToBreed->getBody();
//Распаковываю Json чтобы получить финальную ссылку на картинку
$imageUrl = json_decode($response_bodyGetLinkToBreed, true);
$image = $imageUrl[0]["url"];


?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Get Cat Picture </title>
</head>
<body>
<form action="CatApiFinal.php" method="get">
    <select name='Cats'>
        <option selected>Choose your breed</option>
        <?php
        // Итерации по массиву
        foreach ($breedNames as $breedName) { ?>
            <option value="<?php
            echo $breedName ?>"> <?php
                echo $breedName ?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Нажми меня">
</form>
<img src="<?php
echo $image ?>" width="400px" height="auto" alt="image"/>
</body>
</html>

















