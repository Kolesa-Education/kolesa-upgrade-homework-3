<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats((</title>
</head>
<body>
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/',
    'timeout' => 2.0,
]);

$response = $client->get('v1/images/search');

echo '<pre>';
$result = json_decode($response->getBody()->getContents(),true);
echo '<img src="' . $result[0]['url'] . '">';
?>
</body>
</html>