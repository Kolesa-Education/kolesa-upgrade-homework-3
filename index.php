<?php
$url = 'https://api.thecatapi.com/v1/images/search';

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$response = curl_exec($ch);
$data = json_decode($response, 1);
curl_close($ch);

$img = $data[0]['url'];
require('main.html');

print_r($data);
?>