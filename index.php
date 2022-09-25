<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com/',
        'timeout' => 2.0,
    ]);

    $response = $client->request('GET', 'v1/images/search');

    if ($response->getStatusCode() == 200) {
        $body = $response->getBody()->getContents();
        $body_json = json_decode($body, true);
        $url = $body_json[0]['url'];
    } else {
        $err = 'Recieved wrong answer';
    }
?>

<html>
    <body>
        <?
            if (isset($url)) {
                echo '<img src="' . $url . '"/>';
            } else {
                echo $err;
            }
        ?>
    </body>
</html>