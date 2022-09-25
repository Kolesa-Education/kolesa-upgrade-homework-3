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

    set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context)
    {
        throw new ErrorException( $err_msg, 0, $err_severity, $err_file, $err_line );
    }, E_WARNING);

    try {
        $url = 'https://api.thecatapi.com/v1/images/search';
        $file_content = file_get_contents($url);
    } catch (Exception $e) {
        echo 'Error url'; 
    }

    restore_error_handler();

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

    echo '<pre>';
    $result = json_decode($response->getBody()->getContents(), true);
    echo '<img src="' . $result[0]['url'] . '"width="500" height="500"/>';
    ?>

</body>
</html>
