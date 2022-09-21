<?php

$api_url = "https://api.thecatapi.com/v1/images/search";
$content = file_get_contents($api_url);
$content_json = json_decode($content, true)[0];

$cat_url = $content_json["url"]; 
$img_width = $content_json["width"];
$img_height = $content_json["height"];


?>

<html>
    <body>
        <img width="<?php echo $img_width?>" height="<?php echo $img_height?>" src="<?php echo $cat_url ?>"/>
    </body>
</html>