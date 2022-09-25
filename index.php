<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap');
        .operator{
    width: 50px;
height: 50px;
    font-family: 'Montserrat';
font-style: normal;
font-weight: 400;
font-size: 24px;
line-height: 29px;

text-align: center;
margin: 5px 20px 5px 20px;

color: #1C1D1E;
}
.back{
    margin: 80px 0px 50px 250px;
    width: 1000px;
height: 620px;
    box-sizing: border-box;
    border: 0.5px solid rgba(0, 0, 0, 0.5);
    background: #FFFFFF;
border-radius: 20px;
}
.question{
    margin: 20px 0px 10px 0px;
    font-family: 'Montserrat';
font-style: normal;
font-weight: 500;
font-size: 40px;
line-height: 49px;

text-align: center;

color: #1C1D1E;
}
.note_wrapper{
    margin-top: 20px;
    display: flex;
}
.note{
    
    font-family: 'Montserrat';
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 24px;
text-align: center;

color: #000000;
}
.breed{
    margin: 0px 0px 0px 20px;
    height: 30px;
    background: rgba(196, 196, 196, 0.2);
    font-family: 'Montserrat';
font-style: normal;
font-weight: 300;
font-size: 16px;
line-height: 20px;
text-align: center;
}
.form_wrapper{
    display: flex;
    margin: 0px 0px 0px 180px;
}
.submit{
    margin: 0px 0px 0px 40px;
    background: #798891;
border: 1px solid rgba(0, 0, 0, 0.5);
box-shadow: 0px 4px 4px 2px rgba(0, 0, 0, 0.25);
border-radius: 7px;
font-family: 'Montserrat';
font-style: normal;
font-weight: 400;
font-size: 24px;
line-height: 29px;

text-align: center;
}
.image_wrapper{
    margin: 10px 0px 0px 80px;
    box-sizing: border-box;
    width: 850px;
height: 420px;

border: 0.5px solid #000000;
border-radius: 23px;
display: flex;
  justify-content: center;
}
.image{
    max-width:100%;
    max-height:100%;
    margin: 0 auto;
}
    </style>
</head>
<body style="background: #88A2AD;">
    
<div class="back">
    <div class="question">Do you love cats?</div>
    <div class="note_wrapper">
        <div class="note" style="margin: 15px 0px 10px 250px;">Breed:</div>
    

<!-- </div> -->
</body>
</html>

<?php

$autoloadpass = __DIR__ . '/vendor/autoload.php';
require_once $autoloadpass;

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.thecatapi.com/v1/',
    'timeout'  => 2.0,
]);

$headers = [
    'Content-Type' => 'application/json',
    'x-api-key' => 'live_1oQGZmgJQG9sLllTvG93GNlBfOv6v481I2jtwtt3tt9hfd6OOn3jYUqDVN167f6G'
];

//breeds
$response_breed = $client -> request('GET', 'breeds', $headers);
$breeds = json_decode($response_breed->getBody());

echo '<form method="get"><select class="breed" name="breed">';
foreach($breeds as $i => $breed) {
    echo '<option value="'.$breeds[$i]->id.'">'.$breeds[$i]->name.'</option>';
}
echo '</select><input class="submit" type="submit"></form></div>';
$breed_id = $_GET['breed'] ?? null;



//image
$response = $client -> request('GET', 'images/search', [
    $headers,
    'query' => ['breed_ids' => $breed_id]
]);
$body = $response->getBody();
$arr_body = json_decode($body);
echo '<div class="image_wrapper"><img class="image" src="'.$arr_body[0]->url.'"/></div>';

echo '</div>';
?>