<?php

require_once "CategoryByBreed.php";

$test = new CategoryByBreed();
$breedNames = $test->getBreedNames();
$image = $test->getImageUrl();


?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Get Cat Picture </title>
</head>
<body>
<form action="Index.php" method="get">
    <select name='Cats'>
        <option selected>Choose your breed</option>
        <?php
        // Итерации по массиву
        foreach ($breedNames as $breedName) { ?>
            <option value="<?php
            echo $breedName ?>"> <?php
                echo $breedName ?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Нажми меня">
</form>
<img src="<?php
echo $image ?>" width="400px" height="auto" alt="image"/>
</body>
</html>
















