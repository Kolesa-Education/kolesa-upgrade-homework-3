<?php
require 'vendor/autoload.php';
require('API_KEYS.php');// stores CATS_API_KEY;
use GuzzleHttp\Client;

$status_code = 400;
$image_url = 'src/sleeping_cats.webp';
$headers = ['x-api-key' => CATS_API_KEY];
$client = new Client([
    'base_uri' => 'https://api.thecatapi.com',
    'timeout' => 2.0,
    'auth' => ['x-api-key', CATS_API_KEY]
]);

try {
    $category_response = $client->request('GET', '/v1/categories');
    $categories = json_decode($category_response->getBody()->getContents(), true);
    $status_code = $category_response->getStatusCode();
} catch (Exception $e) {
}

?>

<!DOCTYPE html>
<html>
<head><title>CAT</title></head>
<body style="text-align:center;">
<button onClick="window.location.reload();">Next cat</button>
<br/><br/>

<?php if ($status_code == 200) { ?>

    <form method="get">
        <input type="submit" name="random" value="random">

        <?php foreach ($categories as $category) { ?>
            <input type="submit" name="<?php echo $category["id"]; ?>" value="<?php echo $category["name"]; ?>">
        <?php } ?>

    </form>
    <?php
    $cat_id = '';
    foreach ($categories as $category) {
        if (!empty($_GET[$category['id']])) {
            $cat_id = "?category_ids={$category['id']}";
        }
    }

    try {
        $image_response = $client->request('GET', '/v1/images/search' . $cat_id);
        $image_url = json_decode($image_response->getBody()->getContents(), true)[0]['url'];
    } catch (Exception $e) {
        echo '<h1 style="color:red;">CATS ARE SLEEPING!</h1>';
    }

} else {
    echo '<h1 style="color:red;">CATS ARE SLEEPING!</h1>';
}

?>

<img height="500" src="<?php echo $image_url; ?>"/>
</html>
