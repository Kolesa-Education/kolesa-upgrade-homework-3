<?php
function getRandomImage (){
    $api ='https://api.thecatapi.com/v1/images/search';
    $response= json_decode(file_get_contents($api));
    
        return $response[0]->url;
    

}
function getByCategory($category){
    $api ='https://api.thecatapi.com/v1/images/search?category_ids='.$category;
    $response= json_decode(file_get_contents($api));
    
        return $response[0]->url;
    
}
?>
<h3>random cat</h3>
<img src="<?php echo getRandomImage(); ?>">

<h3>filtered by category cat</h3>
<img src="<?php echo getByCategory(4); ?>">