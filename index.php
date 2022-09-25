<?php
    function status() {
        require 'vendor/autoload.php';
        $check = new GuzzleHttp\Client(['headers' => ['x-api-key' => 'live_UJxHeRo0Hr0VvK6VoeqXCCIoMB5EJoVdLUx0XbQd5oObHP2tOiu8yaidnpmdjItW']]);
        try {
            $errors = $check->request("GET", "https://api.thecatapi.com/v1/categories");
            return $errors->getStatusCode();
        } catch (GuzzleHttp\Exception\ClientException $e) {
            header("Location: ./404.php");
            die();
        }
    }

    $status = status();

    // using file_get_contents
    $firstResponse = file_get_contents("https://api.thecatapi.com/v1/images/search");
    $firstCat = json_decode($firstResponse, true);

    // using curl
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.thecatapi.com/v1/images/search");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $secondResponse = curl_exec($ch);
    curl_close($ch);
    $secondCat = json_decode($secondResponse, true);

    // using Guzzle
    require 'vendor/autoload.php';
    $params = [
        'query' => [
            'limit' => 10,
        ]    
    ];
    $client = new GuzzleHttp\Client(['headers' => ['x-api-key' => 'live_UJxHeRo0Hr0VvK6VoeqXCCIoMB5EJoVdLUx0XbQd5oObHP2tOiu8yaidnpmdjItW']]);
    $thirdResponse = $client->request("GET", "https://api.thecatapi.com/v1/categories", $params);
    $thirdCat = json_decode((string)$thirdResponse->getBody(), true);
    $categoryId = 0;

    foreach ($thirdCat as $cat) {
        if ($cat['name'] == "boxes") {
            $categoryId = $cat['id'];
        }
    }

    $categories = [
        'query' => [
            'category_ids' => $categoryId,
        ]    
    ];

    $getCatResponse = $client->request("GET", "https://api.thecatapi.com/v1/images/search", $categories);
    $getCatCategory = json_decode((string)$getCatResponse->getBody(), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Cats Generator</title>
    <style>
        .first {
            background-image: url("<?=$firstCat[0]["url"]?>");
        }

        .second {
            background-image: url("<?=$secondCat[0]["url"]?>");
        }

        .third {
            background-image: url("<?=$getCatCategory[0]['url']?>");
        }

        .hidden {
            text-align: center;
        }

        .hidden__text {
            margin-top: 30%;
        }

    </style>
</head>
<body>  
    <div class="container">
        <div class="wrapper">
            <div class="wrapper__title">
                <h1 class="container__title">Cats Generator</h1>
            </div>
            <div class="wrapper__cards">
                <div class="card first"><div class="hidden"><h1 class="hidden__text">RANDOM</h1></div></div>
                <div class="card second"><div class="hidden"><h1 class="hidden__text">RANDOM</h1></div></div>
                <div class="card third"><div class="hidden"><h1 class="hidden__text">CATS IN BOXES</h1></div></div>
            </div>
        </div>
    </div>
</body>
</html>