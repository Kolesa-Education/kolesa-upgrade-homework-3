<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get your "CatPic" here!</title>
</head>
<body>
    <br>
    <h2>Here, you see the random cat picture, refresh this page to get another one.</h2>
    <br>
    Use categories for filter by adding <b>?category_ids=</b> to the address link.<br>
    <br>
<?php
$autoloadPath = __DIR__ . '/vendor/autoload.php';

require_once $autoloadPath;

$catService = new Service();
$catService->serviceInitialization();
?>
    <table>
<?php
$catService->getCategory();
?>
    </table>
    <br>
    <div align="center">
<?php
$catService->getPicture();
?>
    </div>
    </body>
    </html>