<?php
  require "Client.php";
  
  $client = new Client();

  $data = $_GET;
  if(isset($data['category'])){
    $result = $client->getCatByCategory($data['category']);
  } else {
    $result = $client->getRandomCat();
  }

  
  if($result == NULL){
    die("Some error occured");
  }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CAAATS</title>
  </head>
  <body>
    <img width="<?php echo $result[0]->width; ?>" height="<?php echo $result[0]->height; ?>" src="<?php echo $result[0]->url; ?>"/>
  </body>
</html>