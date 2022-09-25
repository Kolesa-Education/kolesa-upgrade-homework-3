
<html lang="en">

<style>

    .layout {
        display: flex;
        flex-direction: column;
        gap: 25px;
        flex-wrap: wrap;

        justify-content: space-around;
    }

    .grow1 {
        flex-grow: 1;

    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

</style>

<body>

<?php

    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\GuzzleException;

?>

<section class="layout">

    <h1 style="align-content: center; display: block; margin-left: auto; margin-right: auto;">Five random cats)</h1>
    
    <?php for ($i = 0; $i < 5; $i++) : ?>

        <?php

        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com',
            'timeout'  => 2.0,
        ]);

        try {

            $response = $client->get('v1/images/search');
            $body = $response->getBody();
            $remainingBytes = $body->getContents();
            $cats = json_decode($remainingBytes);

        } catch (GuzzleException $e) {

            echo "An error from sending a request to thecatapi!";

        }

        ?>

            <div class="grow1" >

                <img class="img" src="<?php echo $cats[0]->url?>" width="100" height="100" alt="">

            </div>
    
    <?php endfor ?>

</section>
</body>
</html>
