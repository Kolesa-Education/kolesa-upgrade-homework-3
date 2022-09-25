<?php
$autoloadPath = __DIR__ . '/vendor/autoload.php';
require_once $autoloadPath;

use App\Model\Advert;
use App\Model\Media\Image;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

try {
    $client = new Client([
        'base_uri' => 'https://api.thecatapi.com',
        'timeout' => 2.0,
    ]);

    $statuscode = $response->getStatusCode();

    $response = $client->request('GET', '/v1/images/search');
    $body = $response->getBody();
    $content = $body->getContents();
    $cat = json_decode($content, true)[0]['url'];

    $image = new Image($cat);
    $advert = new Advert();
    $advert->setImage($image);

    echo '<img src="' . $advert->getThumbnail() . '">';

} catch (ClientException $e) {
    echo "ERROR!: " . $e->getMessage();
} catch (ServerException $e) {
    echo "SORRY!: " . $e->getMessage();
}
