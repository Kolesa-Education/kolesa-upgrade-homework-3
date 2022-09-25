<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A random photo of a cat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<script>
    function refreshPage() {
        window.location.reload();
    }
</script>

<body>
<?php

use GuzzleHttp\Client;

require_once 'vendor/autoload.php';
include_once './div.php';

$client = new Client(['base_uri' => 'https://api.thecatapi.com/v1/', 'verify' => false]);

try {
    $response = $client->request('GET', 'images/search');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo sprintf($div, "https://img.freepik.com/free-vector/oops-404-error-with-broken-robot-concept-illustration_114360-1932.jpg", 400, 400);
    return;
}

$body = $response->getBody();

$body = json_decode($body);

echo sprintf($div, $body[0]->url, $body[0]->width, $body[0]->height);
?>

</body>

</html>