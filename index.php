<html>

<body>

  <?php

  use GuzzleHttp\Client;

  require 'vendor/autoload.php';

  $client = new Client([
    'base_uri' => 'https://api.thecatapi.com',
    'timeout'  => 2.0,
  ]);
  $category = $_GET['category_ids'] ?? null;

  try {
    echo  "<h5>Выберите категорию:</h5>";

    $response = $client->request('GET', '/v1/categories');
    $statuscode = $response->getStatusCode();
    $responseBody = $response->getBody();
    $contents = $responseBody->getContents();
    $jsonContent = json_decode($contents, true);
    foreach ($jsonContent as $jsonCategory) {
      $url = $jsonCategory['name'];
      echo  "<a href='".strtok($_SERVER["REQUEST_URI"], '?')."?category_ids=" . $jsonCategory['id'] . "'>" . $jsonCategory['name'] . "</a><br>";
    }
    echo  "<a href='".strtok($_SERVER["REQUEST_URI"], '?')."'>random cat</a><br>";
  } catch (GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
  } catch (GuzzleHttp\Exception\ServerException $e) {
    echo "Ошибка сервера";
  } catch (\Exception $e) {
    echo "Ошибка";
  }

  try {
    if (!isset($category)) {
      $response = $client->request('GET', '/v1/images/search');
    } else {
      $response = $client->request('GET', '/v1/images/search?category_ids=' . $category);
    }
    $statuscode = $response->getStatusCode();

    $responseBody = $response->getBody();
    $contents = $responseBody->getContents();
    $jsonContent = json_decode($contents, true);
    $url = $jsonContent[0]['url'];
    echo '<img src=' . $url . ' alt="random_cat" style="max-width:300px; max-height:300px">';
  } catch (GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
  } catch (GuzzleHttp\Exception\ServerException $e) {
    echo "Ошибка сервера";
  } catch (\Exception $e) {
    echo "Ошибка";
  }


  ?>
</html>
</body>