<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Cat</title>
</head>
<body>
<div class="container text-center mt-5">
    <form id="form" action="index.php" method="post">
        <fieldset>
            <div class="mb-3">
                <select name="category" class="form-select" aria-label="Default select example">
                    <option name="category" selected>Select category</option>
                    <option name="category" value="5">Boxes</option>
                    <option name="category" value="15">Clothes</option>
                    <option name="category" value="2">Space</option>
                    <option name="category" value="1">Hats</option>
                    <option name="category" value="14">Sinks</option>
                    <option name="category" value="4">Sunglasses</option>
                    <option name="category" value=7>Ties</option>
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </div>
        </fieldset>
    </form>
    <div class="mt-2">
        <?php
        if (isset($_POST['submit'])){
            require 'cat.php';
            $pict_url = get_img_url($_POST);
            ?>
            <img src="<?php echo $pict_url ?> " height="500" alt="">
    </div>
    <div>
        <?php echo $pict_url;?>
    </div>
    <?php
    }
    ?>
</div
</body>
</html>