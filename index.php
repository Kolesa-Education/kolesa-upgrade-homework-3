<?php
$CAT_API = "https://api.thecatapi.com/v1/images/search";

$cats = file_get_contents($CAT_API);
$catsArray = json_decode($cats);
print_r($catsArray);

$width = $catsArray[0]->width;
$height = $catsArray[0]->height;
$url = $catsArray[0]->url;

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
