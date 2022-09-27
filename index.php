<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get your "CatPic" here!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <br>
    <h2>Here, you see the random cat picture, refresh this page to get another one.</h2>
    <br>
    Use categories for filter by clicking to the category name or type <b>?category_ids=</b> to the address link.<br>
    <br>
<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/',
    'timeout' => 2.0,
    'verify' => false,
]);
$category = $_GET['category_ids'] ?? null;
$catService = new Service($client, $category);
$catService->getCategoryName($category);
?>
    <div class="container">
        <div>
    <table>
<?php
$catService->getCategories();
?>
    </table>
        </div>
        <div>
<?php
$catService->getPicture($category);
?>
    </div>
    </div>
    </body>
    </html>