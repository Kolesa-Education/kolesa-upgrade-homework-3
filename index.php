<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';

$client = new Client([
  'base_uri' => 'https://api.thecaвtapi.com',
  'timeout'  => 2.0,
]);


try {
  $response = $client->request('GET', '/v1/images/search/');
  $statuscode = $response->getStatusCode();
  
  $responseBody = $response->getBody();
  $contents = $responseBody->getContents();
  $jsonContent = json_decode($contents, true);
  $url = $jsonContent[0]['url'];
  echo '
  <html>
    <body>
      <img src=' . $url . ' alt="random_cat" style="max-width:300px; max-height:300px">
    </body>
  </html>
  ';
} catch (GuzzleHttp\Exception\ClientException $e) {
  echo $e->getResponse()->getStatusCode()." ".$e->getResponse()->getReasonPhrase();
} catch (GuzzleHttp\Exception\ServerException $e) {
  echo "Ошибка сервера";
}  catch (\Exception $e) {
  echo "Ошибка";
}

// print_r(http_response_code(404));
