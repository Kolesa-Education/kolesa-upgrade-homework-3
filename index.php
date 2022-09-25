<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Я котик,ты котик</title>
</head>

<body>
<?php
require __DIR__ . '/vendor/autoload.php';
include "Cat.php";

$catApi = "https://api.thecatapi.com/v1/images/search";
$cat = new Cat();
$index = 0;
$url = 'url';
$arrayCats = json_decode($cat->getCat($catApi), true);
if ($index==0 && $url == 'url') {
    print_r('<html><body><img src="'.$arrayCats[0]['url'].'"/></body></html>');
} else {
    print_r('Not valid key or url');
}
?>
</body>

</html>