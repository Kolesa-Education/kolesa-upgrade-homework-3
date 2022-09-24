<?php

require_once __DIR__ . '/vendor/autoload.php';

const base_url = "https://api.thecatapi.com/";

$client = new GuzzleHttp\Client(['verify' => false]);

class catsGallery{
    private $url;
    private $client;
 
    public function __construct($url, $client)
    {
        $this->url=$url;
        $this->client=$client;
    }

    function getCategories()
    {
        $response = $this->client->request("GET", $this->url."v1/categories");
        $categoryUrl = json_decode($response->getBody(), true);
        asort($categoryUrl);
        foreach($categoryUrl as $category){
            echo $category["id"]." ".$category["name"]."<br>\n";
        }
    }

    function getImg()
    {
        $category = $_GET['category_ids'] ?? null;
        if (isset($category)){
            $addUrl = "v1/images/search?category_ids=$category";
        } else{
            $addUrl = "v1/images/search";
        }

        $result = $this->client->request("GET", $this->url.$addUrl);
        $imgUrl = json_decode($result->getBody(), true);
        foreach ($imgUrl as $img){
            return $img["url"];
        }
    }
}

$objCats = new catsGallery(base_url, $client);
$objCats->getCategories();
echo '<html><body><img src= "'. $objCats->getImg() .'" /></body></html>';

?>
