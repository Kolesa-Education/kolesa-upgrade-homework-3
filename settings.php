<?php

$path =  $_SERVER["PATH_INFO"] ?? null;
$base_uri = 'https://api.thecatapi.com/';
$api_path = $path == null ? 'v1/images/search' : 'v1/images/search' . '/?category_ids='.substr($path, 1, strlen($path)-1);