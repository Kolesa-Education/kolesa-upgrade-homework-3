<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фото котиков</title>
</head>
<body>
<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$image = new catImage();
$image->newClient();
$image->getCategory();
$image->getImage();

?>
</body>
</html>
