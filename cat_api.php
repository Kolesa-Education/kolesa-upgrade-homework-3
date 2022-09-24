<!DOCTYPE html>
<html>
    <body>
    <?php
    require_once "vendor/autoload.php";
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://api.thecatapi.com/v1/images/search', [
        // 'auth' => ['user', 'pass'] 
    ]);
    $response =$res->getBody()->getContents();
    $str_s = substr($response,0);
    $json = json_decode( $str_s, true );
    $url = $json[0]['url'];
    // print_r($url);
    $response = (string) $res->getBody();
    $response =json_decode($response); // Using this you can access any key like below
    ?>
    <img src="<?php echo $url; ?>">
    </body>
</html>