<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Psr7\Request;

$client = new \GuzzleHttp\Client(['verify' => false ]);

// $request = $client->get('https://api.thecatapi.com/v1/images/search');
// $response = $request->send();

// $url = $response->getBody()->url;

$res = $client->request('GET', 'https://api.thecatapi.com/v1/images/search')->getBody()->getContents();

$res = json_decode(substr($res, 1, -1))->url;

?>

<html>
  <body>
    <img src="<?php echo $res?>"/>
  </body>
</html>

