<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Я котик,ты котик</title>
</head>

<body>
<?php

require __DIR__ . '/vendor/autoload.php';


$url = file_get_contents("https://api.thecatapi.com/v1/images/search");

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_URL, 'https://api.thecatapi.com/v1/images/search');
curl_setopt($curl, CURLOPT_REFERER, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);


$parsed = curl_exec($curl);
curl_close($curl);

$arrayData = json_decode($parsed, true);
// echo $arrayData[0]['url'];
?>
<img src="<?php echo $arrayData[0]['url']; ?>" alt="Cat" />
</body>

</html>
