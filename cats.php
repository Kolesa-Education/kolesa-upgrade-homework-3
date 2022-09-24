<?php
require_once "api.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cats</title>


</head>
<body>
    <div class="container">
        <form class="form" action="category.php" method="GET">
            <h2>Your daily cats pictures</h2>
            <select class="select" aria-label="Default select example">
    <?php
        foreach($categJson as $i => $name){
            $catCategory = $categJson[$i]["name"];
    ?>    
            <option value="<?=$catCategory?>"><?=$catCategory?></option>
    <?php
    }
    ?>
            </select>
                
            <img class="image" src="<?=$catImage?>" alt="">
            <button type="submit" class="btn">Check cats</button>
                
                

        </form>
    </div>
    
</body>
</html>