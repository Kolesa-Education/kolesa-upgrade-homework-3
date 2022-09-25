<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    namespace App; //тест и изучение пространства имен
    
    require_once __DIR__ . '/vendor/autoload.php'; 

    use App\Test\Test;
    // use GuzzleHttp\Client;
    // use GuzzleHttp\Exception\RequestException;

    $test = new test();
    echo $test->path(); //тест закончен

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, 'https://api.thecatapi.com/v1/images/search');
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3000);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10000);
    
    $parsed = curl_exec($curl);
    curl_close($curl);

    $arrayData = json_decode($parsed, true);
    ?>
    <img src="<?php echo $arrayData[0]['url']; ?>" />
</body>

</html>