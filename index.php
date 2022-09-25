<?php 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, "https://api.thecatapi.com/v1/categories");
    
    $categories = curl_exec($ch);

    curl_close($ch);

    $categories = json_decode($categories);
    
    if($categories == NULL){
        die("Some error occured");
    }

    if(isset($categories->message)){
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
            <input type="radio" name="categories[]" id = "<?php echo $category->id ?>" value="<?php echo $category->id; ?>"><br>
        <?php
            }
        ?>
        
        <button type="submit" name="showMeCats">Send</button>
    </form>
</body>
</html>