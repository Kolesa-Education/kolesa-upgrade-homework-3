<?php
  $data = $_GET;
    $api = "https://api.thecatapi.com/v1/images/search";
    if(isset($data['categories'])){
      $api .= "?category_ids=";
      $api .= $data['categories'][0];
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $api);

    $result = curl_exec($ch);

    curl_close($ch);
    $result = json_decode($result);
    // var_dump($api);
    
    if($result == NULL){
      die("No result");
    }
?>

<!DOCTYPE html>
<html>
  <body>
    <img width="<?php echo $result[0]->width; ?>" height="<?php echo $result[0]->height; ?>" src="<?php echo $result[0]->url; ?>"/>
  </body>
</html>