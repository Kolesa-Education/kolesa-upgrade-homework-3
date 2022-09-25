<?php
    Class Cats {
        private $url = "";

        function __construct($url) {
            $this->url = $url;
        }

        function checkStatus() {
            require 'vendor/autoload.php';
            $check = new GuzzleHttp\Client(['headers' => ['x-api-key' => 'live_UJxHeRo0Hr0VvK6VoeqXCCIoMB5EJoVdLUx0XbQd5oObHP2tOiu8yaidnpmdjItW']]);
            try {
                $errors = $check->request("GET", $this->url);
                return $errors->getStatusCode();
            } catch (GuzzleHttp\Exception\ClientException $e) {
                header("Location: ./404.php");
                die();
            }
        }
        
        function getImage($name) {
            $this->checkStatus();
            require 'vendor/autoload.php';
            $params = [
                'query' => [
                    'limit' => 10,
                ]    
            ];
            $client = new GuzzleHttp\Client(['headers' => ['x-api-key' => 'live_UJxHeRo0Hr0VvK6VoeqXCCIoMB5EJoVdLUx0XbQd5oObHP2tOiu8yaidnpmdjItW']]);
            $getResponse = $client->request("GET", $this->url, $params);
            $thirdCat = json_decode((string)$getResponse->getBody(), true);
            $categoryId = 0;

            foreach ($thirdCat as $cat) {
                if ($cat['name'] == $name) {
                    $categoryId = $cat['id'];
                }
            }
            $categories = [
                'query' => [
                    'category_ids' => $categoryId,
                ]    
            ];

            $getCatResponse = $client->request("GET", "https://api.thecatapi.com/v1/images/search", $categories);
            $getCatCategory = json_decode((string)$getCatResponse->getBody(), true);
            return $getCatCategory;
        }
    }

    $loadImages = new Cats("https://api.thecatapi.com/v1/categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Cats Generator</title>
</head>
<body>  
    <div class="container">
        <div class="wrapper">
            <div class="wrapper__title">
                <h1 class="container__title">Cats Generator</h1>
            </div>
            <div class="wrapper__cards">
                <?php
                    $categories = array("boxes", "kittens", "dream", "caturday", "clothes", "funny", "hats", "sunglasses", "ties", "caturday");
                    foreach ($categories as $value) {
                        ?><div class="card first" style="background-image: url('<?php echo $loadImages->getImage($value)[0]["url"]; ?>')"></div><?php
                    }
                ?> 
            </div>
        </div>
    </div>
</body>
</html>