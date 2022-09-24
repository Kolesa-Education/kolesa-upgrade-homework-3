<?php

$categories = file_get_contents('https://api.thecatapi.com/v1/categories');
$categories = json_decode($categories);
if (isset($_POST['cat'])){
    $cat = $_POST['cat'];
    echo $cat;
    $homepage = file_get_contents('https://api.thecatapi.com/v1/images/search?category_ids='.$cat);
    $kot = explode( '"', $homepage );
    $kotik = $kot[7];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="cat" >
            <?php foreach($categories as $item): ?>
                <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Select" />
    </form>

    <label>Image</label>
    <div>
        <img src="<?= $kotik ?>" alt="" />
    </div>

</body>
</html>