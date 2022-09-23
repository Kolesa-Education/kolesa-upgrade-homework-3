<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Страничка с котиками</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    Здесь показывают котиков.<br>
    Категорию можно выбрать добавив /?category_ids=

    <?php
    require_once 'getPic.php';
    $pictureUrl = getPic();
    if (is_array($pictureUrl)) {
        echo $pictureUrl[1];
    } else {
        echo '<h1>Привет, вот твой рандомный котик</h1><br>';
        echo '<img src="' . $pictureUrl . '" width="500" height="400" />';
    }
    ?>

</body>

</html>
