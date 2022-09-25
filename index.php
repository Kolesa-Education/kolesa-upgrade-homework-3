<?php 
    require "Client.php";

    $client = new Client();

    $categories = $client->getCategories();

    if($categories == NULL){
        die("Some error occured");
    }
?>

<!DOCTYPE html>
<head>
    <title>Cats by categories</title>
</head>
<body>
    <form action="caat.php" method="get" style = "padding: 20px; border: 4px solid black; text-align: center;">
        <?php
            foreach($categories as $category){
        ?>
            <label for="<?php echo $category->id ?>"><?php echo $category->name; ?></label>
            <input type="radio" name="category" id = "<?php echo $category->id ?>" value="<?php echo $category->id; ?>"><br>
        <?php
            }
        ?>
        
        <button type="submit" name="showMeCats">Send</button>
    </form>
</body>
</html>