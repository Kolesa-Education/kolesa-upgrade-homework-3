<?php

require_once("cats.php");
require_once("api.php");

if(isset($_GET[$catCategory])){
    $linkToGetJson = 'https://api.thecatapi.com/v1/images/search?category_ids=' . $catCategory;
    $categJson = json_decode($linkToGetJson, true );
    $categoryImage = $categJson["url"];
}