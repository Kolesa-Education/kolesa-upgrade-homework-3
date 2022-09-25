<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats never sad</title>
</head>
<body>
    <?php
    
    class ConfigFileNotFoundException extends Exception {}

    try {
        $config_file_path = "index.php";
        if (!file_exists($config_file_path))
        {
            throw new ConfigFileNotFoundException("Configuration file not found.");
        }
    } catch (ConfigFileNotFoundException $e) {
        echo "ConfigFileNotFoundException: ".$e->getMessage();
        die();
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }    
    ?>

    <?php
    
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    
    $client = new Client([
    'base_uri' => 'https://api.thecatapi.com/',
    'timeout' => 2.0,
    'verify' => false,
    ]);

    $response = $client->get('v1/images/search');
    $headers = get_headers('https://api.thecatapi.com/', 1);
    if ($headers[0] == 'HTTP/1.1 200 OK') {
        echo '<pre>';
        $result = json_decode($response->getBody()->getContents(), true);
        echo '<img src="' . $result[0]['url'] . '"width="500" height="500"/>';
    } else {
        echo 'Error';
    }
    ?>

</body>
</html>
