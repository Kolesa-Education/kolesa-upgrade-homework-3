<?php
echo "<link rel='stylesheet' href='style.css'>";
//index.php
$autoloadPath = __DIR__ . '/vendor/autoload.php';

require_once $autoloadPath;

use App\Model\Advert;
use App\Model\Media\Image;

$url = 'https://api.thecatapi.com/v1/images/search';
$options = [
    'APPID' => 'live_H43SovnAYtuh89MztlVjjr5YJbxHOEGTTHMjGvV9fmcVeeRbJnoG4XUGirzfq5FP',
];

$advert = new Advert();

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($options));
$response = curl_exec($ch);
$data = json_decode($response, true);
$img = $data[0]["url"];
curl_close($ch);
echo "<pre>";

if (strstr($data[0]["url"], ".gif")) {
    echo "Гифка";
}else{
    echo "фотка";
};


$image = new Image($img);
$advert->setImage($image);
$content = file_get_contents('https://api.thecatapi.com/v1/images/search');
file_put_contents('скаченные фотки', $content);

echo '
 <h1 class="some">Cats < 3</h1>
 <div class="photo">
 <img src="' . $advert->getThumbnail() . '">
</div>
<div class="main_btn" onclick="window.location.reload();">
<button>Reload</button>
</div>
 ';
