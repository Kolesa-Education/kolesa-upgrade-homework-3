<?php
$autoloadPath = __DIR__ . '/vendor/autoload.php';
require_once $autoloadPath;

use App\Model\Advert;
use App\Model\Media\Image;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Cats</title>
        <link rel="stylesheet" href="src/assets/styles/style.css">
    </head>

    <body>
        <section class="cat" id="cats">
            <div class="container">
                <h2 class="sub-title">Купи котенка, спаси жизнь!</h2>
                <div class="cat-item">
                    <div class="cat-item-image">
                        <?php
                            $client = new Client([
                                'base_uri' => 'https://api.thecatapi.com',
                                'timeout' => 2.0,
                            ]);

                            $response = $client->request('GET', 'https://api.thecatapi.com/v1/images/search');
                            $statuscode = $response->getStatusCode();
                            $body = $response->getBody();
                            $content = $body->getContents();
                            $cat = json_decode($content, true)[0]['url'];

                            $image = new Image($cat);
                            $advert = new Advert();
                            $advert->setImage($image);

                            echo '<img src="' . $advert->getThumbnail() . '"width="auto" height="500">';
                        ?>
                    </div>
                    <div class="cat-item-title"></div>
                    <div class="cat-item-action">
                        <button class="button cat-button">Забронировать</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="price" id="price">
    <div class="container">
        <h2 class="sub-title">Узнать цену и забронировать</h2>
        <div class="price-text">
            Заполните данные, и мы перезвоним вам для уточнения всех деталей бронирования
        </div>
        <form action="" class="price-form">
            <input type="text" class="price-input" id="name" placeholder="Ваше имя">
            <input type="text" class="price-input" id="phone" placeholder="Ваше телефон">
            <input type="text" class="price-input" id="cat" placeholder="Котенок, который вас интересует">
            <button class="button" type="button" id="price-action">Узнать цену</button>
        </form>
    </div>
</section>
        <script src="src/assets/scripts/script.js"></script>

    </body>
</html>