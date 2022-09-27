
<html lang="en">

<style>

    .layout {
        display: flex;
        flex-direction: column;
        gap: 25px;
        flex-wrap: wrap;

        justify-content: space-around;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

</style>

<body>

<?php

    require_once 'cat.php';
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\GuzzleException;

    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com',
        'timeout'  => 2.0,
    ]);

?>

<section class="layout">

    <h1 style="align-content: center; display: block; margin-left: auto; margin-right: auto;">Five random images with cats)</h1>
    
    <?php for ($i = 0; $i < 5; $i++) : ?>

        <?php

        try {

            $response = $client->get('v1/images/search');
            $body = $response->getBody();
            $remainingBytes = $body->getContents();
            $cat = json_decode($remainingBytes);
            $cat_obj = new Cat($cat);
            $cat_obj->displayCat();

        } catch (GuzzleException $e) {

            echo "An error from sending a request to thecatapi!";

        }

        ?>
    
    <?php endfor ?>

</section>
</body>
</html>
