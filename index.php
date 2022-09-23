<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TASK 3</title>
</head>
<body>

<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new GuzzleHttp\Client();
$url = "https://api.thecatapi.com/v1/categories";
$url2 = "https://api.thecatapi.com/v1/images/search";
try {
    $res = $client->request('GET', $url);
    $res2 = $client->request('GET', $url2);
    $body = $res->getBody()->getContents();
    $bod2 = $res2->getBody()->getContents();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage() . "<br>";
    die('Not a valid URL');
}

$obj = json_decode($body, TRUE);
$obj2 = json_decode($bod2, TRUE);
//print_r($obj2[0]['url']);
foreach ($obj2 as $item) {
    echo "<pre>";
    print_r($item);
    echo "</pre>" . "<br>";
}
foreach ($obj2 as $i) {
    foreach ($obj as $j) {
        $obj_id = preg_replace('/[^0-9]/', '', $i['id']);
        if ($j['id'] == $obj_id) {
            ?>

            <img src="<?php echo $i['url']; ?>" alt="oops"/>
            <?php
        } else { ?>
            <img src="<?php echo $obj2[0]['url']; ?>" alt="oops"/>
        <?php }
        break;
    }
}
?>
<?php

?>
</body>
</html>