<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;

class Cats
{
    public $baseUri;
    public $params = [
        "limit" => 10,
        "size" => "med"
    ];

    public function __construct($baseUri, $params)
    {
        $this->baseUri = $baseUri;
        $this->params = ["query" => [...$this->params, ...$params]];
    }

    public function getCats()
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        try {
            $response = $client->request('GET', '/v1/images/search', $this->params);
            $body = $response->getBody();
            $arrBody = json_decode($body);
            foreach ($arrBody as $cat) {
                print_r('<img src="' . $cat->url . '"/>');
            }
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }
}

?>

<body>
    <div class="form-container">
        <form id="category" method="GET">
            <select class="custom-select" name="category">
                <option value="all" selected>All</option>
                <option value="hats">Hats</option>
                <option value="space">space</option>
                <option value="funny">funny</option>
                <option value="sunglasses">sunglasses</option>
                <option value="boxes">boxes</option>
                <option value="caturday">caturday</option>
                <option value="ties">ties</option>
                <option value="dream">dream</option>
                <option value="ties">ties</option>
                <option value="kittens">kittens</option>
                <option value="sinks">sinks</option>
                <option value="clothes">clothes</option>
            </select>
            <button type="submit" class="custom-button ">Submit</button>
        </form>
    </div>
    <div class="container">
        <?php
        $category = !empty($_GET['category']) ?  $_GET['category'] : "default";

        switch ($category) {
            case "hats":
                $cats = new Cats('https://api.thecatapi.com',  [
                    "category_ids" => 1,
                ]);
                $cats->getCats();
                break;

            case "space":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 2,
                ]);
                $cats->getCats();
                break;

            case "funny":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 3,
                ]);
                $cats->getCats();
                break;
            case "sunglasses":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 4,
                ]);
                $cats->getCats();
                break;
            case "boxes":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 5,
                ]);
                $cats->getCats();
                break;
            case "caturday":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 6,
                ]);
                $cats->getCats();
                break;
            case "ties":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 7,
                ]);
                $cats->getCats();
                break;
            case "dream":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 9,
                ]);
                $cats->getCats();
                break;
            case "kittens":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 10,
                ]);
                $cats->getCats();
                break;
            case "sinks":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 14,
                ]);
                $cats->getCats();
                break;
            case "clothes":
                $cats = new Cats('https://api.thecatapi.com', [
                    "category_ids" => 15,
                ]);
                $cats->getCats();
                break;
            case "all":
                $cats = new Cats('https://api.thecatapi.com', []);
                $cats->getCats();
                break;
            default:
                $cats = new Cats('https://api.thecatapi.com', []);
                $cats->getCats();
                break;
        }
        ?>
    </div>
</body>

<style>
    .form-container {
        padding: 20px 0px;
    }

    .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 16px;
    }

    .container img {
        width: 400px;
        height: 400px;
        object-fit: cover;
    }

    .custom-select {
        border: none;
        font-size: 20px;
        padding: 10px 15px;
        background-color: dodgerblue;
        color: white;
    }

    .custom-select option {
        padding: 5px 0px;
    }

    .custom-button {
        border: none;
        font-size: 20px;
        padding: 5px 10px;
        background-color: dodgerblue;
        color: white;
    }
</style>


</html>