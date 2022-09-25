<?php

$imageURL = "";

function GetKittyURL()
{
    $curlHandler = curl_init();

    curl_setopt($curlHandler, CURLOPT_URL, "https://api.thecatapi.com/v1/images/search");
    curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);

    $jsonObject = curl_exec($curlHandler);
    $encodedObject = json_decode($jsonObject, true);
    $GLOBALS['imageURL'] = $encodedObject[0]['url'];

    curl_close($curlHandler);
}

GetKittyURL();

require('index.html');
