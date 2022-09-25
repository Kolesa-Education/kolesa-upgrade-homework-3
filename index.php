<?php
    $CATS_API = "https://api.thecatapi.com/v1/images/search";

    $json_cats = file_get_contents($CATS_API); // reading cats api in json format 
    $cats_array = json_decode($json_cats); // converting json into array
    print_r($cats_array);

    // reading the array
    $width = $cats_array[0]->width;
    $height = $cats_array[0]->height;
    $url = $cats_array[0]->url;
    
    echo $width . "\n";
    echo $height . "\n";
    echo $url . "\n";
?>
<!DOCTYPE html>
<html> 
    <body>
        <div class="images">
            <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $url; ?>"/>
        </div>
    </body>
</html>