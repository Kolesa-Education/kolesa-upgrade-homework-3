<?php

$urlstring = "https://api.thecatapi.com/v1/breeds/search?q=" . str_replace(' ', '%20', $_GET["name"]);
$data = file_get_contents($urlstring); 
$dataj = json_decode($data);