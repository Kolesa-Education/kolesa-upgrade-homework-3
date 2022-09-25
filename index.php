<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/vendor/autoload.php';

const base_url = "https://api.thecatapi.com/";

$client = new GuzzleHttp\Client(['verify' => false]);

class CatsGallery
{
    private $url;
    private $client;


    public function __construct($url, $client)
    {
        $this->url    = $url;
        $this->client = $client;
    }

    function getImg()
    {
        $addUrl = "v1/images/search";

        try {
            $result = $this->client->request("GET", $this->url . $addUrl);
            $imgUrl = json_decode($result->getBody(), true);
            foreach ($imgUrl as $img) {
                return $img["url"];
            }
            if (empty($imgUrl)) {
                return ["Что то пошло не так", '<h1>Попробуйте другой запрос.<h1>'];
            } else {
                return ["success", $result[0]['url']];
            }
        } catch (\Exception $error) {
            return [$error->getMessage(), '<h1>Попробуйте другой запрос.<h1>'];
        }
    }
}


$cat = new CatsGallery(base_url, $client);

echo '<html xmlns="http://www.w3.org/1999/html"/> 
<body>
<h1> "Cats one love" </h1>
<img src= "' . $cat->getImg() . '"  
</body>
</html>';
?>
