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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Play:wght@400;700&family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:wght@500&display=swap" rel="stylesheet">
    <title>Cats</title>


</head>
<body>
    <div class="container">
        <form class="form" action="category.php?=" method="GET">
            <h2 class="title">Your daily cats pictures</h2>
            <select class="select" aria-label="Default select example">
    <?php
        foreach($categJson as $i => $name){
            $catCategory = $categJson[$i]["name"];
            print_r($catCategory);
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