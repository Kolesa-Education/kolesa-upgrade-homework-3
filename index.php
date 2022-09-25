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
        require "src/CatApi.php";
        
        $client = new CatApi();

        $client->getCatApi();    
    ?>

</body>
</html>
