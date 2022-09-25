<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Zhanarys\ProjectCat\Model\CatImage;

// Создание экземпляра класса
$client = new Client([
    'timeout' => 2.0,
    'verify' => false
]);

// Отправка HTTP-запроса
$response = $client->get('https://api.thecatapi.com/v1/images/search');
$body = $response->getBody();
$data = json_decode($body ->getContents(),associative: true);

$url = $data[0]['url'];
$id = $data[0]['id'];
$width = $data[0]['width'];
$height = $data[0]['height'];

$catImg = new CatImage($url,$id,$width,$height);

echo $catImg->getInfo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Случайное фото котика</title>
</head>

<body>
    <h1>Cat</h1>
    <img src= "<?php echo $data[0]['url']; ?>"; width="<?php echo $data[0]['width'] ?>" height="<?php echo $data[0]['height'] ?>" alt="cat">
</body>
</html>